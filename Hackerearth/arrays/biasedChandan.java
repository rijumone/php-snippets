/**
 * 
 */

import java.io.BufferedReader;
import java.io.InputStreamReader;

/**
 * @author sumits3
 *
 */
public class biasedChandan {

	/**
	 * 
	 */
	public biasedChandan () {
		// TODO Auto-generated constructor stub
	}

	/**
	 * @param args
	 */
	public static void main(String[] args) {
		
		try{
			String thisLine = "";
			int n = 0;
			BufferedReader br = new BufferedReader(new InputStreamReader(System.in));
			n = br.readLine());
			
			while ((thisLine = br.readLine()) != null) {
            System.out.println("you entered:" +thisLine);
            if(thisLine.equalsIgnoreCase("rijumone")){
            	break;
            }

            for(int i = 0 ; i < n ; i++){
            	
            }


		
			System.out.println("type more below :");
			System.out.println();
         }       
      } catch(Exception e) {
         e.printStackTrace();
      }
	}

}
