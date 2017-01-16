/**
 * 
 */

import java.io.BufferedReader;
import java.io.InputStreamReader;

/**
 * @author sumits3
 *
 */
public class InputStdin {

	/**
	 * 
	 */
	public InputStdin() {
		// TODO Auto-generated constructor stub
	}

	/**
	 * @param args
	 */
	public static void main(String[] args) {
		System.out.println("this will print main method argument if passed");
		for(int i = 0; i < args.length; i++) {
            System.out.println("argument no."+i + " : " +args[i]);
        }
		
		System.out.println("the way needed by you");
		System.out.println("Enter the line to read");
		System.out.println("if you type your first name the program will exit.");
		System.out.println();
		try{
			String thisLine = "";
		BufferedReader br = new BufferedReader(new InputStreamReader(System.in));
		while ((thisLine = br.readLine()) != null) {
            System.out.println("you entered:" +thisLine);
            if(thisLine.equalsIgnoreCase("rijumone")){
            	break;
            }
		
System.out.println("type more below :");
System.out.println();
         }       
      }catch(Exception e){
         e.printStackTrace();
      }
	}

}
