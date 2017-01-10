

 import java.util.*;
import java.io.BufferedWriter;
import java.io.FileWriter;
import java.io.IOException;
 
import org.jsoup.Jsoup;
import org.jsoup.nodes.Document;
import org.jsoup.nodes.Element;
import org.jsoup.select.Elements;

public class web3_wiki_desc {
 
	public static void main(final String[] args) throws IOException {
		
		 Document doc = Jsoup.connect("http://en.wikipedia.org/wiki/"+args[0])
		 .userAgent("Mozilla").timeout(6000).get();
		 
		 
		      Elements select1 = doc.select("div.mw-content-ltr p");
		      Elements select2 = doc.select("table.infobox.geography.vcard p");
		
		      String s="";
			String nw="";
		      for(Element link : select2)
		      {
		    	  if(select1.contains(link))
		    	  {
		    		  select1.remove(link);
		    		  
		    	  }
		      }
		      for (Element i : select1)
		      {
		    	  //System.out.println(i.text());
			  s=s+"<p>"+i.text()+"</p>";
			  
			  boolean b=false;
			  int count=0;
			  for (char ch : s.toCharArray()){
  			        if(ch=='(' || ch == '['){
				b=true;
				count++;
			      }
			      if(b) {
				if(ch==')' || ch==']'){
					count--;
					if(count==0){
						b=false;	
					}
				}
			      }
			      else
				nw+=ch;
  			  }
		    	  break;
		      }
		       System.out.println(nw);
		      
		 }
		}
