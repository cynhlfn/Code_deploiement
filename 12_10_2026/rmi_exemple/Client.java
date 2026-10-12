import java.rmi.*;

public class Client {
    public static void main(String[] args) throws Exception {
        Hello stub = (Hello) Naming.lookup("rmi://localhost/Hello"); // interoger le registry pour recuperer le stub correspondant au nom "Hello"
        // (Hello) le cast vers l'interface car le client connais que hello et pas helloimp

        System.out.println(stub.sayHello("Samir"));// appel de la methode
    }
}