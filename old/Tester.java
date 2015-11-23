
import java.util.Random;
import java.util.Scanner;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 *
 * FUCKIN NOTE: BLOM BENER MOVEMENT BLOM UPDATE "LOCATE" CEK LAGI X Y ITU YG
 * BUKAN BARIS KOLOM
 *
 * UTK GETTER LOCATE PAKE YANG DI PLANET
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

        /*
         //instasiasi pemain
         String nama="daniel";//sc.next();
         Astronot a1=new Astronot(nama);
         board.addAstronot(0, a1);
         nama="ivan";//sc.next();
         Astronot a2=new Astronot(nama);
        
         //instasiasi warper
         int xin=2;//sc.nextInt();
         int yin=0;//sc.nextInt();
         int xout=2;//sc.nextInt();
         int yout=1;//sc.nextInt();
         Locator w1=new SpaceWarpGate(xin,yin,xout,yout);
         Locator w2=new SpaceWarpGate(xout,yout,xout,yout);
        
         //instansiasi blackhole        
         xin=3;//sc.nextInt();
         yin=1;//sc.nextInt();
         xout=0;//sc.nextInt();
         yout=0;//sc.nextInt();
         Locator b1=new BlackHole(xin,yin,xout,yout);
         Locator b2=new BlackHole(xout,yout,xout,yout);
         */
        
        /*
         //masukin objek-objek
         for(int i=0;i<board.getNumAs();i++){
         String namaA="a";
         Astronot a=new Astronot(namaA);
         board.addAstronot(i, a);
         }
         for(int i=0;i<board.getNumWG();i++){
         int xin=1;//sc.nextInt();
         int yin=9;//sc.nextInt();
         int xout=2;//sc.nextInt();
         int yout=8;//sc.nextInt();
         Locator w=new SpaceWarpGate(xin,yin,xout,yout);
         board.addWarper(i, (SpaceWarpGate) w);
         board.getPlanet(yin,xin).setWarpPl((SpaceWarpGate) w);
         board.getPlanet(yout,xout).setWarpPl((SpaceWarpGate) w);
         }
         for(int i=0;i<board.getNumBH();i++){
         int xin=2;//sc.nextInt();
         int yin=9;//sc.nextInt();
         int xout=0;//sc.nextInt();
         int yout=9;//sc.nextInt();
         Locator b=new BlackHole(xin,yin,xout,yout);
         board.addBlackHole(i, (BlackHole) b);
         board.getPlanet(yin,xin).setHolePl((BlackHole) b);
         board.getPlanet(yout,xout).setHolePl((BlackHole) b);
         }
        
         int numMove=board.dice.roll();
         for(int i=0;i<numMove;i++){
         board.getAsAt(0).move();
         //board.getPlanet(board.getAsAt(0).getYAs(), board.getAsAt(0).getXAs()).setLocatePl(board.getAsAt(0).getYAs(), board.getAsAt(0).getXAs());
         board.getAsAt(0).setLocateAs();
         }
        
         if(board.getPlanet(board.getAsAt(0).getYAs(),board.getAsAt(0).getXAs()).getHolePl()!=null){
         //kalo nginjek blackhole ubah posisi player ke xout yout
         System.out.println("kena blackhole");
         int xawal=board.getAsAt(0).getXAs();
         int yawal=board.getAsAt(0).getYAs();
         //simpen dulu posisi nya di variabel agar tidak terlalu rujid
         int xout=board.getPlanet(yawal,xawal).getHolePl().getxOutLc();
         int yout=board.getPlanet(yawal,xawal).getHolePl().getyOutLc();
         //ubah posisi player
         board.getAsAt(0).setXAs(xout);
         board.getAsAt(0).setYAs(yout);
         //update locate player
         //board.getPlanet(board.getAsAt(0).getYAs(), board.getAsAt(0).getXAs()).setLocatePl(board.getAsAt(0).getYAs(), board.getAsAt(0).getXAs());
         board.getAsAt(0).setLocateAs();
         }
         if(board.getPlanet(board.getAsAt(0).getYAs(),board.getAsAt(0).getXAs()).getWarpPl()!=null){
         //kalo nginjek warp ubah posisi player ke xout yout
         System.out.println("kena warp");
         int xawal=board.getAsAt(0).getXAs();
         int yawal=board.getAsAt(0).getYAs();
         //simpen dulu posisi nya di variabel agar tidak terlalu rujid
         int xout=board.getPlanet(yawal,xawal).getWarpPl().getxOutLc();
         int yout=board.getPlanet(yawal,xawal).getWarpPl().getyOutLc();
         //ubah posisi player
         board.getAsAt(0).setXAs(xout);
         board.getAsAt(0).setYAs(yout);
         //update locate player
         //board.getPlanet(board.getAsAt(0).getYAs(), board.getAsAt(0).getXAs()).setLocatePl(board.getAsAt(0).getYAs(), board.getAsAt(0).getXAs());
         board.getAsAt(0).setLocateAs();
         }
        
         //buat debugging
         System.out.println("player0:");
         System.out.println("x:"+board.getAsAt(0).getXAs()+" y:"+board.getAsAt(0).getYAs());
         System.out.println("di posisi: "+board.getAsAt(0).getLocateAs());
         */
    }
}
