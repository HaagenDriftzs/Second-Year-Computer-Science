package designPatterns.composite;
 
import java.util.ArrayList;
import java.util.List;
 
public class Drawing implements Shape{
 
    //collection of Shapes
    String name;
    private List<Shape> shapes;
    
    public Drawing(String n) {
        shapes = new ArrayList<Shape>();
        name = n;
    }   
    
    public void draw(String fillColor) {
        System.out.println("Drawing Drawing " + name + " with color " + fillColor);
        for(Shape sh : shapes)
        {
            sh.draw(fillColor);
        }
    }
     
    //adding shape to drawing
    public void add(Shape s){
        this.shapes.add(s);
    }
     
    //removing shape from drawing
    public void remove(Shape s){
        shapes.remove(s);
    }
     
    //removing all the shapes
    public void clear(){
        System.out.println("\nClearing all the shapes from drawing\n");
        this.shapes.clear();
    }
}