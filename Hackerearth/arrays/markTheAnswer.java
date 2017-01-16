/**
 * 
 */

import java.io.BufferedReader;
import java.io.InputStreamReader;

/**
 * @author sumits3
 *
 */
public class markTheAnswer {

	/**
	 * 
	 */
	public markTheAnswer () {
		// TODO Auto-generated constructor stub
	}

	/**
	 * @param args
	 */
	public static void main(String[] args) {
		
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
      } catch(Exception e) {
         e.printStackTrace();
      }
	}

}
