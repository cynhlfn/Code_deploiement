## RMI

rmi = (Remote method invocation)
il permet l'appel de methode sur machine distante

import java.rmi.\*

public interface Hello extends Remote {
String sayHello(String name) throws RemoteException;
}
// extends Remote ici veux dire que les methodes peuvent etre appelé a distance

## implementation de l'objet :

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
