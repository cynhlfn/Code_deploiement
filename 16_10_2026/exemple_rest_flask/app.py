from flask import Flask, jsonify, request
# créer l'application Flask
app = Flask(__name__)
  # Une liste d'étudiants
students = [
  {"id":1, "name":"Youcef", "age":21},
  {"id":2, "name":"Samir", "age":41},
  ]
  # Racine de l'API pour tester si le serveur fonctionne ....
@app.route('/')
def home():
  return "Bienvenue dans l'API de gestion des étudiants !"

# Endpoint pour lister tous les étudiants ....
@app.route('/students', methods=['GET'])
# Méthode HTTP Get qui permet de retourner la liste des étudiants
def get_students():
  #"jsonif transforme la liste students en json"
  return jsonify(students)
# Activer mode Debug pour voir les erreurs et recharger automatiquement le serveur
if __name__ == '__main__':
  app.run(host="0.0.0.0", port=5001, debug=True)