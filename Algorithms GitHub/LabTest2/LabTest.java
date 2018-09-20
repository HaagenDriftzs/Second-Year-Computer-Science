// StackTest.java
// Linked list implementation of Stack

 class StackException extends Exception { 
    public StackException(String s) {
        super(s);
    }
}

class Stack {
       
    class Node {
        char data;
        Node next;  
    }
    private Node top;
      
    public Stack()
    { 
        top = null;
    }
        
    public void push(char x) {
        Node  t = new Node();
        t.data = x;
        t.next = top;
        top = t;
    }

    // only to be called if list is non-empty.
    // Otherwise an exception should be thrown.
    public char pop() throws StackException
    {
        if(this.isEmpty()) 
            throw new StackException("\nIllegal to pop() an empty Stack\n");
        
        char x = top.data;
        top = top.next;
        return x;        
    }

    
    public boolean isEmpty(){
       return top == null;
    }


    public int size() {
        int c = 0;
        Node t = top;
        while(t != null) {
            ++c;
            t = t.next;
        }
        return c;        
    }
    
    public void display() {
        Node t = top;
        //Console.Write("\nStack contents are:  ");
        System.out.println("\nStack contents are:  ");
        
        while (t != null) {            
            System.out.print(t.data + " ");
            t = t.next;
        }       
        System.out.println("\n");
    }
	public void count(char x)
	{
		Node temp = top.next;
		int count1 = 0;
		
		if(isEmpty())
		{
			return 0;
		}
		else if(top.data == x)
		{
			count1++;
		}
		while(temp.next != null)
		{
			if(temp.data == x)
			{
				count1++;
			}
			temp = temp.next;
		}
		if(temp.data == x)
		{
			count1++;
		}
		
		return count1;
	}
	
	public void remove(char x)
	{
		Node temp = top.next;
		if(isEmpty())
		{
			return false;
		}
		else if(top.data == x)
		{
			top = top.next;
			return true;
		}
		Node prev = top;
		while(temp.data != null)
		{
			if(temp.data == x)
			{
				prev.next = temp.next;
				return true;
			}
			temp = temp.next;
			prev = temp;
		}
		if(temp.data == x)
		{
			prev.next = null;
			return true;
		}
		return false;
	}
}


public class StackTest
{
    public static void main( String[] arg){
        Stack s = new Stack();
        System.out.println("Stack is created\n");
        
        // piece of code to test our exception mechanism
        try {
            s.pop();
        } catch (StackException e) {
            System.out.println("Exception thrown: " + e);
        }
        
        s.push('a'); s.push('b'); s.push('c'); s.push('d');
        s.display();
        
        System.out.println("Stack size is " + s.size());
		
		//System,out.println("Stack count is " + s.count();)
		if(!s.isEmpty())
		{
			char i = s.pop();
			System.out.println("Just popped " + i);
			s.display();
			boolean c = s.remove('a');
			if(c)
			{
				s.display();
			}
		}
        
        
    }
}


