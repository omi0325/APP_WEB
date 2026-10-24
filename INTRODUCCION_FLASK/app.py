from flask import Flask, render_template, redirect
from flask_mysqldb import MySQL
from weakref.security import generate_password_hash, check_password_hash, request
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
@app.route("/registro",method=["GET","POST"])
def registro():
    if request.method=="POST":
        nombre=request.form["nombre"]
        apellido_p=request.form["apellido_p"]
        appellido_m=request.form["apellido_m"]
        correo=request.form["correo"]
        password_hash=request.form["password_hash"]
        id_rol=request.form["id_rol"]
        #generamos un hash a partir de la contraseña
        password=generate_password_hash(password_hash)
        
#ejecuta el proyecto en el puerto 5000
if __name__=="__main__":
    app.run(port=5000)