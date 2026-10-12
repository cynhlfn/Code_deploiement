## RMI

rmi = (Remote method invocation)
il permet l'appel de methode sur machine distante

- le serveur cree l'objet reel
- le registry associer un nom a l'objet
  import java.rmi.registry.\*;
- le client cherche l'objet dans le registary puis utilise ces methodes.

import java.rmi.\*

public interface Hello extends Remote {
String sayHello(String name) throws RemoteException;
}
// extends Remote ici veux dire que les methodes peuvent etre appelé a distance

### implementation de l'objet :

// c'est le code qui s'execute coté serveur
import java.rmi.server._;
import java.rmi._;

// la class UnicastRemoteObject permet d'exporter l'objet

public class HelloImpl extends UnicastRemoteObject implements Hello {
public HelloImpl() throws RemoteException {}
public String sayHello(String name) {
return "Bonjour " + name + "!";
}
}

### serveur RMI

public class Server {
public static void main(String[] args) throws Exception {
HelloImpl obj = new HelloImpl();
LocateRegistry.createRegistry(1099);
Naming.rebind("rmi://localhost/Hello", obj);
System.out.println("Serveur pret !");
}
}

### Client RMI

import java.rmi.\*;

public class Client {
public static void main(String[] args) throws Exception {
Hello stub = {Hello} Naming.lookup("rmi://localhost/Hello");
System.out.println(stub.sayHello("Samir"));
}
}
