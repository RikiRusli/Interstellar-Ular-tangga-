
import java.util.Random;
import java.util.Scanner;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 *
 * 
 */
/**
 *
 * @author i14032
 */
public class Tester {

    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        //instasiasi papan
        //Board board = new Board(6, 3, 3, 2);
        InterstellarCompVsComp g1 = new InterstellarCompVsComp();
        g1.play();
        
        //InterstellarHumanVsHuman g2= new InterstellarHumanVsHuman();
        //g2.play();
        
        //InterstellarHumanVsComp g3=new InterstellarHumanVsComp();
        //g3.play();

       
    }
}
