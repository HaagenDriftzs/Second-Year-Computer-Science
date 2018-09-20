package designPatterns.composite;
 
public class Triangle implements Shape {
 
    private String name;
    
    public Triangle(String n) {
        name = n;
    }
    
    public void draw(String fillColor) {
        System.out.println("Drawing Triangle " + name + " with color " + fillColor);
    }
}