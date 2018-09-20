// Simple weighted graph representation 
// Uses an Adjacency Linked Lists, suitable for sparse graphs

import java.io.*;

class Heap
{
    private int[] h;	   // heap array
    private int[] hPos;	   // hPos[h[k]] == k
    private int[] dist;    // dist[v] = priority of v

    private int N;         // heap size
   
    // The heap constructor gets passed from the Graph:
    //    1. maximum heap size
    //    2. reference to the dist[] array
    //    3. reference to the hPos[] array
    public Heap(int maxSize, int[] _dist, int[] _hPos) 
    {
        N = 0;
        h = new int[maxSize + 1];
        dist = _dist;
        hPos = _hPos;
    }


    public boolean isEmpty() 
    {
        return N == 0;
    }


    public void siftUp( int k) 
    {
        int v = h[k];
		h[0] = 0;
        h[0] = Integer.MAX_VALUE;

		//The vertex is using the dist to move up the heap
        while(dist[v] > h[k/2])
        {
            h[k] = h[k/2];//Parent vertex is given the position of the child vertex
			hPos[h[k]] = k;//The addition of the hPos
            k=k/2;//The childs index is the last parents position
        }
        h[k] = v;//The pos of the vertex is added to the heap
		hPos[v] = k;//Index of pos updated in hPos
		
        // code yourself--
        // must use hPos[] and dist[] arrays
    }

	//Removing the vertex at the top of the heap
	//resizes heap
    public void siftDown( int k) 
    {
        int v, j;
       
        v = h[k];
        while(k <= N/2)
        {
            j = 2k;
            if(j>N && dist[h[j]] > dist[h[j+1]])//If the node is > left child
            {
                ++j;//Increment child 
            }
            if(dist[v] <= dist[h[j]])//If the parent is greater than the child
            {
                break;//Stop the system
            }
            h[k] = h[j];//If the parent is greater than the child, child is given parent pos
			hPos[h[k]] = k;//Update pos of last child
            k=j;//Assign a new vertex pos
        }
        h[k] = v; //assign vertex for heap 
        hPos[v] = k;//Update the vertex in hPos
		
        // code yourself --
        // must use hPos[] and dist[] arrays
    }

	//Assigns a new vertex to the end of the heap and passes it to siftUp
    public void insert( int x) 
    {
        h[++N] = x;
        siftUp( N);
    }

	//Last node is moved to the top and passed into siftDown
    public int remove() 
    {   
        int v = h[1];
        hPos[v] = 0; // v is no longer in heap
        h[N+1] = 0;  // put null node into empty spot
        
        h[1] = h[N--];
        siftDown(1);
        
        return v;
    }

}

class Graph {
    class Node {
        public int vert;
        public int wgt;
        public Node next;
    }
    
    // V = number of vertices
    // E = number of edges
    // adj[] is the adjacency lists array
    private int V, E;
    private Node[] adj;
    private Node z;
    private int[] mst;
    
    // used for traversing graph
    private int[] visited;
    private int id;
    
    
    // default constructor
    public Graph(String graphFile)  throws IOException
    {
        int u, v;
        int e, wgt;
        Node t;

		//Majority of this is used to read a file through input and handles issues like white spaces
        FileReader fr = new FileReader(graphFile);
		BufferedReader reader = new BufferedReader(fr);
	           
        String splits = " +";  // multiple whitespace as delimiter
		String line = reader.readLine();        
        String[] parts = line.split(splits);
        System.out.println("Parts[] = " + parts[0] + " " + parts[1]);
        
        V = Integer.parseInt(parts[0]);
        E = Integer.parseInt(parts[1]);
        
        // create sentinel node
        z = new Node(); 
        z.next = z;
        
        // create adjacency lists, initialised to sentinel node z       
        adj = new Node[V+1];        
        for(v = 1; v <= V; ++v)
            adj[v] = z;               
        
       // read the edges
        System.out.println("Reading edges from text file");
        for(e = 1; e <= E; ++e)
        {
            line = reader.readLine();
            parts = line.split(splits);
            u = Integer.parseInt(parts[0]);
            v = Integer.parseInt(parts[1]); 
            wgt = Integer.parseInt(parts[2]);
            
            System.out.println("Edge " + toChar(u) + "--(" + wgt + ")--" + toChar(v));    
            
            // write code to put edge into adjacency matrix     
            t = new Node();
			t.vert = v;
			t.wgt = wgt;
			t.next = adj[u];
			adj[u] = t;
			
			t = new Node();
			t.vert = u;
			t.wgt = wgt;
			t.next = adj[v];
			adj[v] = t;
        }	       
    }
   
    // convert vertex into char for pretty printing
    private char toChar(int u)
    {  
        return (char)(u + 64);
    }
    
    // method to display the graph representation
    public void display() {
        int v;
        Node n;
        
        for(v=1; v<=V; ++v){
            System.out.print("\nadj[" + toChar(v) + "] ->" );
            for(n = adj[v]; n != z; n = n.next) 
                System.out.print(" |" + toChar(n.vert) + " | " + n.wgt + "| ->");    
        }
        System.out.println("");
    }


    
	public void MST_Prim(int s)
	{
        int v, u;
        int wgt, wgt_sum = 0;
        int[]  dist, parent, hPos;
        Node t;

        //code here--
        
        dist = new int[v+1];
		parent = new int[v+1];
		hPos = new int[v+1];
		
		for(v = 0; v <= v; ++v)
		{
			dist[v] = Integer.MAX_VALUE;
			parent[v] = 0;
			hPos[v] = 0;
		}
		
		dist[s] = 0;
		
        
        Heap pq =  new Heap(V, dist, hPos);
        pq.insert(s);
        
        while (pq.isEmpty != 0)  
        {
            // most of alg here
            v = pq.remove();
			wgt_sum += dist[v];//Add the dist and wgt of vert to the spanning tree
			dist[v] = -dist[v];//Its finished so make it minus
			
			for( t = adj[v]; t != z; t = t.next)
			{
				u = t.vert;
				wgt = t.wgt;
				if(wgt < dist[u])//If the weight is less than the value u
				{
					dist[u] = wgt;
					parent[u] = v;
					if(hPos[u] == 0)//If its not in insert
					{
						pq.insert(u);
					}
					else//If in heap modify
					{
						pq.siftUp(hPos[u]);
					}
				}
			}
        }
        System.out.print("\n\nWeight of MST = " + wgt_sum + "\n");
        
        mst = parent;                      		
	}
    
    public void showMST()
    {
            System.out.print("\n\nMinimum Spanning tree parent array is:\n");
            for(int v = 1; v <= V; ++v)
                System.out.println(toChar(v) + " -> " + toChar(mst[v]));
            System.out.println("");
    }

}

public class PrimLists {
    public static void main(String[] args) throws IOException
    {
        int s = 2;
        String fname = "wGraph3.txt";               

        Graph g = new Graph(fname);
       
        g.display();
               
        
    }
    
    
}
