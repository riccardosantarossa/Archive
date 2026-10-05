
//SANTAROSSA RICCARDO 5BIA 07/04/2022

package mio.contatore;

public class visitatore {

	int id;
	String ip;
	int porta;
	String timestamp;
	
	public visitatore(int id, String ip, int porta, String timestamp)
	{
		this.id = id;
		this.ip = ip;
		this.porta = porta;
		this.timestamp = timestamp;
	}
	
	public int getId() {
		return id;
	}

	public String getIp() {
		return ip;
	}

	public int getPorta() {
		return porta;
	}


	public String getTimestamp() {
		return timestamp;
	}

	
	
}
