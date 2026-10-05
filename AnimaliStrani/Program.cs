using AnimaliStrani;
using System;
using System.ComponentModel.Design;

namespace AnimaliStrani
{
    class AnimaliStrani
    {
        enum Tipo
        {
            ippogrifo,
            pegaso,
            unicorno
        }
        private string nome;
        private int energia, energiamax;
        public readonly bool volo;
        private Tipo tipo;

        public AnimaliStrani()
        {       
            tipo = (Tipo) (new Random()).Next(3);
            switch (tipo)
            {
                case Tipo.ippogrifo:
                    volo = true;
                    energia = energiamax= 120;                
                break;

                case Tipo.pegaso:
                    volo = true;
                    energia = energiamax = 80;
                break;

                case Tipo.unicorno:
                    volo = false;
                    energia = energiamax = 100;
                break;
            }
        }

        public int GetEnergiaMax() { return energiamax; }
        public int GetEnergia() { return energia; }
        public void DecEnergia() {  energia -= 1; }
        public void AddEnergia() { energia += 1; }
        public string GetStatus( AnimaliStrani a)
        {
            string stato,v;

            if (a.volo == true)
                v = " sa volare ";
            else
                v = " non sa volare ";

            if (a.energia > a.energiamax * 0.8)
                stato = " è sazio";
            else
                if (a.energia > a.energiamax * 0.4 && a.energia < a.energiamax * 0.79)
                stato = " ha fame";
            else
                    if (a.energia == 0)
                         stato = " è morto ";
                    else
                         stato = "sta morendo di fame";

            return a.tipo + a.nome + " ha " + a.energia + " quindi " + stato + "." + v; 
        }

        static void Main(string[] args)
        {
            AnimaliStrani a = new AnimaliStrani();
            a.nome = "Pippo";

            //Decrementa l'energia dell'animale con il passare del tempo
            /*
            for (int i = a.energiamax; i > 0; i--)
            {
                a.DecEnergia();
                if (a.energia == 0)
                    Console.WriteLine("L'animale è morto");
                else   
                    Console.WriteLine("L'animale " + a.nome + " è di tipo " + a.tipo + " e ha " + a.energia + " energia in questo momento");  
            }*/

            //Incrementa l'energia dell'animale quando viene nutrito 
            /*a.energia = 0;
            for (int i=a.energia; i<a.energiamax; i++)
            {
                a.AddEnergia();
                if (a.energia == a.energiamax)
                    Console.WriteLine("L'animale è sazio");
                else
                    Console.WriteLine("L'animale " + a.nome + " è di tipo " + a.tipo + " e ha " + a.energia + " energia in questo momento");
            }*/

            
        }


    }
}
