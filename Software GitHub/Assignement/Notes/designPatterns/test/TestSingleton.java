package designPatterns.test;

import designPatterns.singleton.Singleton;

public class TestSingleton {
    public static void main(String[] args) {

       //illegal construct
       //Compile Time Error: The constructor SingleObject() is not visible
       //Singleton object = new Singletont();

       //Get the only object available
       Singleton object = Singleton.getInstance();

       //show the message
       object.showMessage();
    }
}
