import java.rmi.*;
import java.rmi.registry.*;

public class Server {
      public static void main(String[] args) throws Exception {
        HelloImpl obj = new HelloImpl(); // cree l'objet reel et l'exporte automatiquement
        LocateRegistry.createRegistry(1099); // demarer l'annuaire rmi sur le port 1099 (port par defaut )
        Naming.rebind("rmi://localhost/Hello", obj);
        System.out.println("Serveur prêt !");
    }
}
