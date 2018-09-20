package designPatterns.test;
 
import designPatterns.composite.Circle;
import designPatterns.composite.Drawing;
import designPatterns.composite.Shape;
import designPatterns.composite.Triangle;
 
public class TestCompositePattern {
 
    public static void main(String[] args) {
        Shape tri1 = new Triangle("trianle 1");
        Shape tri2 = new Triangle("triangle 2");
        Shape cir1 = new Circle("circle 1");
        Shape cir2 = new Circle("circle 2");
        
        Drawing drawing = new Drawing("drawing");
        Drawing drawing2 = new Drawing("sub-drawing");
        drawing.add(tri1);
        drawing.add(cir1);
        drawing2.add(cir2);
        drawing2.add(tri2);
        drawing.add(drawing2);
         
         
        drawing.draw("Red");
         
        drawing.clear();
         
        drawing.add(tri1);
        drawing.add(cir1);
        drawing.draw("Green");
    }
 
}