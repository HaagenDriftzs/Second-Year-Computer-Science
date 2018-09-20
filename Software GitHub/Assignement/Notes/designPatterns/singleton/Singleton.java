// Singleton Desaign pattern Implemented in Java

package designPatterns.singleton;

public class Singleton {
	private static Singleton uniqueInstance;
    
    private Singleton() {}
    
	public static Singleton getInstance() {
		if (uniqueInstance == null) {
			synchronized (Singleton.class) {
				if (uniqueInstance == null) {
					uniqueInstance = new Singleton();
				}
			}
		}
		return uniqueInstance;
	}
    
    public void showMessage(){
        System.out.println("\nGreetings from the unique, one and only ME!");
    }
 }   
 
 