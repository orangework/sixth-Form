from flask import Flask
import sqlite3 as lite
from flask import Flask, render_template,request,redirect,url_for,session,escape
import psutil
import datetime
app = Flask(__name__)


version = "0.1"


def getServerInfo():
    cpu = psutil.cpu_percent()
    ram =  psutil.virtual_memory()[2]
    return "Cpu:%s | Ram:%s"%(cpu,ram)


def getActive():
    con = lite.connect('data.db')
    with con:

        cur = con.cursor()
        cur.execute("SELECT * FROM access LIMIT 10")#It will only work if both values are there

        rows = cur.fetchall()
        t = []
        i = 0
        for r in rows:
            cur.execute("SELECT * FROM details where clientId=?",(r[0],))#It will only work if both values are there
            row = cur.fetchone()
            t.append([row[1],rows[i][1]])
            i+=1
        return t

def getTeachers():
    con = lite.connect('data.db')
    with con:

        cur = con.cursor()
        cur.execute("SELECT * FROM whoIsNotIn")#It will only work if both values are there

        rows = cur.fetchall()

        return rows



def getStudents():
    con = lite.connect('data.db')
    with con:

        cur = con.cursor()
        cur.execute("SELECT * FROM details WHERE status=?",("no",))#It will only work if both values are there

        rows = cur.fetchall()

        return rows

def getLastTeacherUpdate():
        con = lite.connect('data.db')
        with con:

            cur = con.cursor()
            cur.execute("SELECT * FROM change")#It will only work if both values are there

            row = cur.fetchone()

            return row



@app.route('/')
def index():
    return render_template("index.html", ver=version,info=getServerInfo())
@app.route('/e')
def errorIndex():
    return render_template("index.html", ver=version,info=getServerInfo(),error="Incorrect username/password")


@app.route("/connect/",methods=["POST","GET"])
@app.route("/connect/index")
def login():
    if(request.method == "POST"):
        user = request.form['u']
        password = request.form['p']
        ##auth user##
        con = lite.connect('data.db')
        with con:
            cur = con.cursor()
            cur.execute("SELECT * FROM details WHERE username=? AND password=?",(user,password))#It will only work if both values are there
            row = cur.fetchone()
            if(not row):##incorrect
                print "incorrect username or password"
                return redirect("/e")
            else:
                session['username'] = user
                session['loggedin'] = True
                return render_template("connect/index.html",active=getActive(),teachers=getTeachers(),students=getStudents())
    else:
        if(session.get('loggedin')):
            return render_template("connect/index.html",active=getActive(),teachers=getTeachers(),students=getStudents())



@app.route("/connect/teachers")
def teachersPage():

    if(session.get('loggedin')):
        return render_template("connect/teachers.html",teachers=getTeachers(),last=getLastTeacherUpdate()[0])

    else:
        return redirect("/")

@app.route("/connect/delAll")
def deleteAll():
    if(session.get('loggedin')):
        con = lite.connect('data.db')
        with con:

            cur = con.cursor()
            cur.execute("DELETE FROM whoIsNotIn")#It will only work if both values are there
        return redirect("/connect/teachers")
    else:
        return redirect("/")

@app.route("/connect/delOne")
def deleteOne():
    if(session.get('loggedin')):
        teacher = request.args.get('teacher')
        con = lite.connect('data.db')
        with con:

            cur = con.cursor()
            cur.execute("DELETE FROM whoIsNotIn WHERE teacher=?",(teacher,))#It will only work if both values are there
            return redirect("/connect/teachers")
    else:
        return redirect("/")
@app.route("/connect/addTeacher")
def addTeacher():
    if(session.get('loggedin')):
        teacher = escape(request.args.get("teacher"))
        subject = escape(request.args.get("subject"))
        comment = escape(request.args.get("comment"))
        con = lite.connect('data.db')
        with con:

            cur = con.cursor()
            t = datetime.datetime.now().strftime("%A, %d. %B %Y %I:%M%p")
            cur.execute("INSERT INTO whoIsNotIn VALUES(?,?,?)",(teacher,subject,comment,))#It will only work if both values are there
            cur.execute("UPDATE change SET stamp=?",(t,))#It will only work if both values are there


        return redirect("/connect/teachers")
    else:
        return redirect("/")
@app.route("/connect/students")
def studentsPage():
    if(session.get('loggedin')):
        return render_template("connect/students.html",students=getStudents())
    else:
        return redirect("/")


@app.route("/connect/studentOut",methods=["POST"])
def studentOut():
    if(session.get('loggedin')):
        student = escape(request.form['student'])
        reason = escape(request.form['reason'])
        con = lite.connect('data.db')
        with con:

            cur = con.cursor()
            t = datetime.datetime.now().strftime("%A, %d. %B %Y %I:%M%p")
            cur.execute("UPDATE details SET status='no', edit=?, reason=? WHERE username=?",(t,reason,student,))#It will only work if both values are there


        return redirect("/connect/students")
    else:
        return redirect("/")

@app.route("/connect/studentIn",methods=["POST"])
def studentsIn():
    if(session.get('loggedin')):
        student = escape(request.form['clientId'])
        con = lite.connect('data.db')
        with con:

            cur = con.cursor()
            t = datetime.datetime.now().strftime("%A, %d. %B %Y %I:%M%p")
            cur.execute("UPDATE details SET status='yes', edit=? WHERE clientId=?",(t,student,))#It will only work if both values are there


        return redirect("/connect/students")
    else:
        return redirect("/")

@app.route("/connect/settings")
def settingsPage():
    if(session.get('loggedin')):
        return render_template("connect/settings.php")
    else:
        return redirect("/")
@app.route("/connect/logout")
def logoutPage():
    session.pop("username",None)
    return redirect("/")


app.secret_key = "\x9d \x95\xcb\\\x0c\xa3\x01\x14\x1d|\xe9\x0fh\x1d\xe5qr\xb3R\x99`\xbcD\xc7\x80\xf1\x0b\x03G\xc5^sv\xc6\xff}S<vx\x90\'\xacy\xa2\x83\xe950\xf5\xf7\x1c\xe3\xd2\xb4\x03\xd8\xde\x0f\xde\ru\xf8\xbd\xf1\x8e\xf9_\xb4\x9c\xe9\x86\x16;\x07\x0c\x8e{\xdeMMs\xaf\x02\xc45\x14b\xc5\x1f\xc9>\'\x81m\x82 \xc8\x7f[l>\xa7\x91S\xba\xdc\x9f0E.3\xb94{\x13\xf1\xf5\xd0\x9d\xdb\x8ew\xf8\xcf\x14\xa1\x0c*1Z\x93A\xd1cy\xb88\xc8\xb1)\xf6\xdaa\x0e\x97\n\xad\nMz\x05H)\xec\xbdE\xde\xd52\xa9\xef\xd4B\xe5\x08\xf2VZHd\xe0\x7f\xc7Aj\xff\xef\xfft\xd9-)\xc8~\xaa\xb7\xad;\xe2Q\x92pZ&\xc9\xf4\x02\xbe\xae\ni\xbc*D:h\x81\xe5\xd6j\x82\xa2h\xa6m\xb6{\x1f\xa7\x16\x8a\x93\xff\x838\xad)"

if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0')
