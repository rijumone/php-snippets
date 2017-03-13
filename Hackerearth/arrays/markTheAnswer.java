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
    public markTheAnswer() {
        // TODO Auto-generated constructor stub
    }

    /**
     * @param args
     *    7 6
	 *    4 3 7 6 7 2 2
     */
    public static void main(String[] args) {
        int linesOfInput = 2;
        String lineOne,lineTwo;
        int nQ,skill;
        int answer = 0;
		String[] lineOneSplit,lineTwoSplit,q;//lineOne.split(",");
        // System.out.println(foo);
        try {
            String thisLine = "";
            BufferedReader br = new BufferedReader(new InputStreamReader(System.in));
            /*
            while ((thisLine = br.readLine()) != null) {
                System.out.println("you entered:" + thisLine);
                if (thisLine.equalsIgnoreCase("rijumone")) {
                    break;
                }

                System.out.println("type more below :");
                System.out.println();
            }
            */
            // for (int i = 0; i <= linesOfInput; i++) {
        	lineOne = br.readLine();
        	lineOneSplit = lineOne.split(" ");
        	// System.out.println(lineOneSplit[1]);
			nQ = Integer.parseInt(lineOneSplit[0]);
			skill = Integer.parseInt(lineOneSplit[1]);
			lineOne = br.readLine();
        	q = lineOne.split(" ");
        	int skippedFlag = 0;

        	// System.out.println(q);
        	for(int i = 0 ; i < q.length ; i++){
/*
        		System.out.println("Currently: " + q[i]);
        		// q[i] = Integer.parseInt(q[i]);
        		if( Integer.parseInt(q[i]) > skill){ System.out.println(q[i] + " this is too much");
        			skippedFlag++;
        		}System.out.println("skippedFlag: " + skippedFlag);
    			if(skippedFlag > 2){
    				break;
    			}
    			if(Integer.parseInt(q[i]) <= skill){
    				answer++;	
    			}
    			     		
    			System.out.println("answer: " + answer);
*/
                if(Integer.parseInt(q[i]) <= skill && skippedFlag <= 1){
                    answer++;   
                }else{
                    skippedFlag++;
                }
                if(skippedFlag > 1){
                    break;
                }
        	}
        	System.out.println(answer);

            // }

        } catch (Exception e) {
            e.printStackTrace();
        }
    }

}