// ceci est l'interface distante
import java.rmi.*;

// herite de remote donc les methodes de cette classe peuvent étre appelés a distance 
public interface Hello extends Remote {
    //la methode que le client peut appeler
    String sayHello(String name) throws RemoteException;// obligatoir dans chaque methode d'une interface distante pour traiter les cas d'echec des de l'appel reseaux

}