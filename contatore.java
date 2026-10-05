//SANTAROSSA RICCARDO 5BIA 24/03/2022

package mio.contatore;

import java.io.IOException;
import java.util.ArrayList;
import java.util.Date;
import java.util.Iterator;
import java.util.ListIterator;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class demoServer
 */
@WebServlet("/contatore")
public class contatore extends HttpServlet {
	private static final long serialVersionUID = 1L;
	int count;
	int id;
	boolean saltaAggiunta = false;
	ArrayList <visitatore> list = new ArrayList<visitatore>();
	 ListIterator<visitatore> listIterator= list.listIterator();
	
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public contatore() {
        super();
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		//response.getWriter().append("Served at: ").append(request.getContextPath());
		
		//RESET
		String param =request.getParameter("andonio");
		
		//Riga tabella
		String param2 =request.getParameter("gianni");
		
		//Cancella il singolo elemnento
		String param3 =request.getParameter("cancellino");
		
		
		
		if(param!=null)
		{
			count=0;
			id=0;
			list.clear();
			saltaAggiunta=true;
			response.sendRedirect("/demoSerber/contatore");
			request.setAttribute("count",count);
			request.setAttribute("list",list);
		}
		else if(param2!=null)
		{
			list.removeIf(v -> v.id == Integer.parseInt(param3));
			saltaAggiunta=true;
			response.sendRedirect("/demoSerber/contatore");
			request.setAttribute("count",count);
			request.setAttribute("list",list);
		}
		else if(param ==null && param2==null)
		{
			if(!saltaAggiunta)
			{
				count ++ ;
				id++;
				Date date = new Date();
				visitatore v = new visitatore(id,request.getRemoteAddr(), request.getRemotePort(), date.toString());
				list.add(v);
			}
			else
				saltaAggiunta=false;
			
			request.setAttribute("count",count);
			request.setAttribute("list",list);
			RequestDispatcher disp = request.getRequestDispatcher("/WEB-INF/ContaView.jsp");
			disp.forward(request, response);
		}
		
	}	

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		doGet(request, response);
	}
	
	public void init()
	{
		count = 0;
	}
	

}
