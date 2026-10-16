import java.rmi.*;
import java.rmi.server.*;

// cette classe fourni le vrai code de la hello
// UnicastRemoteObject permet l'export de l'objet (ouverture d'un port ,creation d'un stub)
public class HelloImpl extends UnicastRemoteObject implements Hello {
    public HelloImpl() throws RemoteException {} // l'export ce fait a la construction donc il peut relever une exception 

    public String sayHello(String name) {
        return "Bonjour " + name + "!";
    }
}