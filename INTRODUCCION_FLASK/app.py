from flask import Flask, render_template, redirect, request, url_for,session
from flask_mysqldb import MySQL
from werkzeug.security import generate_password_hash, check_password_hash
app=Flask(__name__)
app.config["TEMPLATES_AUTO_RELOAD"]=True
app.config['MYSQL_HOST']='localhost'
app.config['MYSQL_USER']='root'
app.config['MYSQL_PASSWORD']=''
app.config['MYSQL_DB']='dbflask'
app.secret_key='mysecretkey'
mysql=MySQL(app)
@app.route("/")
#crear una funcion
def home():
    #retornar un mensaje
    return render_template("login.html")
@app.route("/registro",methods=["GET","POST"])
def registro():
    if request.method=="POST":
        nombre=request.form["nombre"]
        apellido_p=request.form["apellido_p"]
        apellido_m=request.form["apellido_m"]
        correo=request.form["correo"]
        password_hash=request.form["password_hash"]
        id_rol=request.form["id_rol"] 
        #generamos un hash a partir de la contraseña
        password=generate_password_hash(password_hash)
        cursor=mysql.connection.cursor()
        cursor.execute(
            "SELECT id FROM usuarios WHERE correo=%s",
            (correo,)
        )
        if cursor.fetchone():
            cursor.close()
            return render_template("registro.html")
        cursor.execute(
            """INSERT INTO usuarios
            (nombre,apellido_p,apellido_m,correo,password_hash,id_rol)
            VALUES (%s,%s,%s,%s,%s,%s)
            """,(
                nombre,
                apellido_p,
                apellido_m,
                correo,
                password,
                id_rol
            )
        )
        mysql.connection.commit()
        cursor.close()
        return redirect(url_for("home"))
    return render_template("registro.html")
@app.route("/login",methods=["GET","POST"])
def login():
    if request.method=="POST":
        correo=request.form["correo"]
        password_hash=request.form["password_hash"]
        #crear un cursor para ejecutar las consultas SQL
        cursor=mysql.connection.cursor()
        #Consultar SQL
        sql="""
        SELECT 
        usuarios.id,
        usuarios.nombre,
        usuarios.apellido_p,
        usuarios.apellido_m,
        usuarios.correo,
        usuarios.password_hash,
        roles.nombre
        FROM usuarios
        INNER JOIN roles
        ON usuarios.id_rol = roles.id_rol
        WHERE usuarios.correo = %s
        """
        #vamos a ejecutar la consulta pasada como parametro el correo 
        cursor.execute(sql,(correo,))
        #recuperar el primer registro encontrado
        usuario=cursor.fetchone()
        #Cerramos el cursor
        cursor.close()
        #Vamos a comparar la contraseña con el hash generado anteriormente al registrar el usuario
        if usuario and check_password_hash(usuario[5],password_hash):

            session["id_usuario"]=usuario[0]
            session["nombre"]=usuario[1]
            session["rol"]=usuario[6]
            #si el rol es administrador lo manda a la ruta administrador sino a la de usuario
            if session["rol"]=="Administrador":
                return  redirect(url_for("admin"))
            return redirect(url_for("usuario"))
        return render_template("login.html", error="correo o contraseña incorrectos")
    return render_template("login.html")
#ruta de administrador
@app.route("/admin")
def admin():
    if "id_usuario"not in session:
        return redirect (url_for("login"))
    if session.get("rol")!="administrador":
        return "Acceso denegado"
    return render_template("administrador.html",nombre=session["nombre"])
@app.route("/usuario")
def usuario():
    if "id_usuario" not in session:
        return redirect(url_for("login"))
    if session.get("rol")!="usuarios":
        return "Acceso denegado"
    return render_template("usuarios.html",nombre=session["nombre"])
@app.route("/logout")
def logout():
    session.clear()
    return redirect(url_for("login"))

#ejecuta el proyecto en el puerto 5000
if __name__=="__main__":
    app.run(port=5000)