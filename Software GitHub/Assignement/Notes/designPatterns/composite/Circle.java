package designPatterns.composite;
 
public class Circle implements Shape {
 
    private String name;
    
    public Circle(String n) {
        name = n;
    }
    
    public void draw(String fillColor) {
        System.out.println("Drawing Circle " + name + " with color " + fillColor);
    }
 
}