from spyne import Application, rpc, ServiceBase, Integer, Unicode, Iterable, ComplexModel
from spyne.protocol.soap import Soap11
from spyne.server.wsgi import WsgiApplication
from wsgiref.simple_server import make_server

# Liste d'étudiants en mémoire
students = [
    {"id": 1, "name": "Youcef", "age": 21},
    {"id": 2, "name": "Samir", "age": 41},
]

# Définition d'un type complexe Student
class Student(ComplexModel):
    id = Integer
    name = Unicode
    age = Integer

class StudentService(ServiceBase):

    @rpc(_returns=Iterable(Student))
    def get_all_students(ctx):
        """
        Renvoie tous les étudiants de la liste
        """
        # Convertir le dictionnaire en Student
        return [Student(**s) for s in students]
    
    @rpc(Integer, _returns=Student)
    def get_student_by_id(ctx, student_id):
        """
        Renvoie l'étudiant dont l'identifiant est student_id
        (ne renvoie rien si l'identifiant n'existe pas)
        """
        for s in students:
            if s["id"] == student_id:
                return Student(**s)
        return None

    @rpc(Unicode, Integer, _returns=Student)
    def add_student(ctx, name, age):
        """
        Ajoute un étudiant (l'identifiant est généré automatiquement)
        et renvoie l'étudiant créé
        """
        # Nouvel id = plus grand id existant + 1 (ou 1 si la liste est vide)
        new_id = max((s["id"] for s in students), default=0) + 1
        new_student = {"id": new_id, "name": name, "age": age}
        students.append(new_student)
        return Student(**new_student)

    @rpc(Integer, _returns=Unicode)
    def delete_student(ctx, student_id):
        """
        Supprime l'étudiant dont l'identifiant est student_id
        et renvoie un message indiquant le résultat
        """
        for s in students:
            if s["id"] == student_id:
                students.remove(s)
                return "Étudiant supprimé"
        return "Étudiant introuvable"
    
    @rpc(Integer, Unicode, Integer, _returns=Student)
    def update_student(ctx, student_id, name, age):
        """
        Met à jour le nom et l'âge de l'étudiant dont l'identifiant est student_id
        et renvoie l'étudiant modifié (ne renvoie rien si l'id n'existe pas)
        """
        for s in students:
            if s["id"] == student_id:
                s["name"] = name
                s["age"] = age
                return Student(**s)
        return None

# Création de l'application Spyne
application = Application(
    [StudentService],
    tns='spyne.examples.students',
    in_protocol=Soap11(validator='lxml'),
    out_protocol=Soap11()
)

wsgi_app = WsgiApplication(application)

if __name__ == "__main__":
    server = make_server('0.0.0.0', 8000, wsgi_app)
    print("Service SOAP démarré sur http://localhost:8000")
    server.serve_forever()