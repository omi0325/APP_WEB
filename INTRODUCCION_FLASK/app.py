from flask import Flask, render_template, redirect
app=Flask(__name__)
app.config["TEMPLATES_AUTO_RELOAD"]=True
@app.route("/")
#crear una funcion
def home():
    #retornar un mensaje
    return render_template("index.html")
@app.route("/guardar")
def guardar():
    #retornar un mensaje
    return "guardado correctamente"
@app.route("/login")
def login():
    return render_template("login.html")
@app.route("/logout")
def logout():
    return redirect("/login")
#ejecuta el proyecto en el puerto 5000
if __name__=="__main__":
    app.run(port=5000)