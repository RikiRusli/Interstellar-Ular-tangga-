
import java.util.Random;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 *
 * @author i14032
 */
public class InterstellarCompVsComp {

    private Random rd = new Random();
    private int numBH = rd.nextInt(3)+1;
    private int numWG = rd.nextInt(3)+1;
    private Board board = new Board(6, 5, 5, 2);

    private int xin = 0;
    private int xout = 0;
    private int yin = 0;
    private int yout = 0;

    /**
     *
     * @param isGanjil kalo masukin 0 buat bikin angka ganjil
     */
    private void setXIn(int isGanjil) {
        int x = rd.nextInt(2)+1;
        x+= isGanjil;
        if (x % 2 == 0) {
            x++;
        }
        this.xin = x;
    }

    /**
     *
     * @param isGanjil kalo masukin 0 buat bikin angka ganjil
     */
    private void setXOut(int isGanjil) {
        int x = rd.nextInt(2)+1;
        x+=isGanjil;
        if (x % 2 == 0) {
            x++;
        }
        this.xout = x;
    }

    /**
     * buat masukin nilai yin
     *
     * @param isGanjil kalo masukin 0 buat bikin angka ganjil
     */
    private void setYIn(int isGanjil) {
        int x = rd.nextInt(3) +1;
        x+=isGanjil;
        if (x % 2 == 0) {
            x++;
        }
        this.yin = x;
    }

    /**
     * buat masukin nilai yout
     *
     * @param isGanjil kalo masukin 0 buat bikin angka ganjil
     */
    private void setYOut(int isGanjil) {
        int x = rd.nextInt(3)+1;
        x+=isGanjil;
        if (x % 2 == 0) {
            x++;
        }
        this.yout = x;
    }

    /**
     * buat objek blackhole sesuai jumlah blackhole
     */
    public void makeAllBH() {
        //blackhole di ganjil
        if(numBH%2!=0){
             numBH++;
        }
        for (int i = 0; i < numBH; i+=2) {
            this.setXIn(1);
            this.setYIn(1);
            this.setXOut(1);
            this.setYOut(1);
            Locator b1 = new BlackHole(xin, yin, xout, yout);
            Locator b2 = new BlackHole(xin, yin, xout, yout);
            board.getPlanet(yin, xin).setHolePl((BlackHole) b1);
            board.getPlanet(yout, xout).setHolePl((BlackHole) b2);
            board.addBlackHole(i, (BlackHole) b1);
            board.addBlackHole(i + 1, (BlackHole) b2);
        }
    }

    /**
     * buat objek warp sesuai jumlah warp
     */
    public void makeAllWG() {
        if(numWG%2!=0){
             numWG++;
        }
        for (int i = 0; i < numWG; i+=2) {
            //warper di genap
            this.setXIn(0);
            this.setYIn(0);
            this.setXOut(0);
            this.setYOut(0);
            Locator w1 = new SpaceWarpGate(xin, yin, xout, yout);
            Locator w2 = new SpaceWarpGate(xin, yin, xout, yout);
            board.getPlanet(yin, xin).setWarpPl((SpaceWarpGate) w1);
            board.getPlanet(yout, xout).setWarpPl((SpaceWarpGate) w2);
            board.addWarper(i, (SpaceWarpGate) w1);
            board.addWarper(i + 1, (SpaceWarpGate) w2);
        }
    }

    /**
     * buat objek player nya
     */
    public void makeAllAs() {
        for (int i = 0; i < 2; i++) {
            Astronot as = new Astronot("astronot" + (i+1) + "");
            board.addAstronot(i, as);
        }
    }

    public boolean endGame(Astronot as, int endPoint) {
        //terjadi menang jika salah satu player sudah mencapai titik 100
        if (as.getLocateAs() == endPoint) {
            return true;

        } else {
            return false;
        }

    }

    /**
     * print board buat text mode console
     */
    public void print() {
        for (int i = 0; i < 10; i++) {
            for (int j = 0; j < 10; j++) {
                //player diwakilkan dengan X dan Y
                //kotak kosong dengan Φ
                //black hole dengan β
                //warp dengan ω
                if (board.getPlanet(i, j).getWarpPl() != null) {
                    System.out.print("ω ");
                } else if (board.getPlanet(i, j).getHolePl() != null) {
                    System.out.print("β ");
                } else if (board.getAsAt(0).getLocateAs() == board.getPlanet(i, j).getLocatePl()) {
                    System.out.print("X ");
                } else if (board.getPlanet(i, j).getLocatePl() == board.getAsAt(1).getLocateAs()) {
                    System.out.print("Y ");
                } else {
                    System.out.print("Φ ");
                }
            }
            System.out.println("");
        }
    }

    /**
     * method play 2 player human
     */
    public void play() {
        //inisiasi semua objek dulu
        this.makeAllAs();
        this.makeAllBH();
        this.makeAllWG();
        
        
        boolean lanjut = true;
        //genap player 1,ganjil player 2, penentuan player 1 dan player 2 sebelum inisiasi objek
        //ngga bakal ada player 2 jalan lbh dulu dari player 1
        //penentuan siapa player 1 sebelum permainan di mulai utk di bagian visualisasi
        int giliran = 0;
        while (lanjut) {
            int dadu = board.dice.roll();

            do {
                //kalo gerak out of bounds / melebihi 100
                if (board.getAsAt(giliran).getLocateAs() + dadu > 100) {
                    //System.out.println("JLEGUR ANJING");
                    board.getAsAt(giliran).moveBackward(dadu);
                    board.getAsAt(giliran).setLocateAs();
                } else {
                    for (int i = 0; i < dadu; i++) {
                        board.getAsAt(giliran).move();
                        board.getAsAt(giliran).setLocateAs();
                    }
                }
                if(dadu==6){
                    System.out.println("Lucky 6!!!");
                }
                //kocok lagi
                dadu = board.dice.roll();
                
                //kalo dapet dadu 6 jalan lagi
            } while (dadu == 6);
            
            //System.out.println("x:"+board.getAsAt(giliran).getXAs()+" y:"+board.getAsAt(giliran).getYAs());
            
            if (board.getPlanet(board.getAsAt(giliran).getYAs(), board.getAsAt(giliran).getXAs()).getHolePl()!=null) {
                //kalo nginjek blackhole ubah posisi player ke xout yout
               
                int xawal = board.getAsAt(giliran).getXAs();
                int yawal = board.getAsAt(giliran).getYAs();
                //simpen dulu posisi nya di variabel agar tidak terlalu rujid
                int xout = board.getPlanet(yawal, xawal).getHolePl().getxOutLc();
                int yout = board.getPlanet(yawal, xawal).getHolePl().getyOutLc();
                //ubah posisi player
                board.getAsAt(giliran).setXAs(xout);
                board.getAsAt(giliran).setYAs(yout);
                //update locate player
                //board.getPlanet(board.getAsAt(0).getYAs(), board.getAsAt(0).getXAs()).setLocatePl(board.getAsAt(0).getYAs(), board.getAsAt(0).getXAs());
                board.getAsAt(giliran).setLocateAs();
                System.out.println(board.getAsAt(giliran).getName()+"kena blackhole ke posisi:"+board.getAsAt(giliran).getLocateAs());
            }
            
            if (board.getPlanet(board.getAsAt(giliran).getYAs(), board.getAsAt(giliran).getXAs()).getWarpPl() != null) {
                //kalo nginjek warp ubah posisi player ke xout yout
                
                int xawal = board.getAsAt(giliran).getXAs();
                int yawal = board.getAsAt(giliran).getYAs();
                //simpen dulu posisi nya di variabel agar tidak terlalu rujid
                int xout = board.getPlanet(yawal, xawal).getWarpPl().getxOutLc();
                int yout = board.getPlanet(yawal, xawal).getWarpPl().getyOutLc();
                //ubah posisi player
                board.getAsAt(giliran).setXAs(xout);
                board.getAsAt(giliran).setYAs(yout);
                //update locate player
                //board.getPlanet(board.getAsAt(0).getYAs(), board.getAsAt(0).getXAs()).setLocatePl(board.getAsAt(0).getYAs(), board.getAsAt(0).getXAs());
                board.getAsAt(giliran).setLocateAs();
                System.out.println(board.getAsAt(giliran).getName()+"kena warp ke posisi:"+board.getAsAt(giliran).getLocateAs());
            }
            
            //kalo nginjek lawan
            if (giliran == 0) {
                if (board.getAsAt(giliran).getLocateAs() == board.getAsAt(giliran + 1).getLocateAs()) {
                    board.getAsAt(1).setXAs(0);
                    board.getAsAt(1).setYAs(9);
                    board.getAsAt(1).setLocateAs();
                    System.out.println("mampus keinjek!!!");
                }
            }
            if (giliran == 1) {
                if (board.getAsAt(giliran).getLocateAs() == board.getAsAt(0).getLocateAs()) {
                    board.getAsAt(0).setXAs(0);
                    board.getAsAt(0).setYAs(9);
                    board.getAsAt(0).setLocateAs();
                    System.out.println("mampus keinjek!!!");
                }
            }
            //System.out.println(board.getAsAt(giliran).getName() + " pada posisi:" + board.getAsAt(giliran).getLocateAs());
            System.out.println(board.getAsAt(0).getName()+" pada posisi:"+board.getAsAt(0).getLocateAs());
            System.out.println(board.getAsAt(1).getName()+" pada posisi:"+board.getAsAt(1).getLocateAs());
            this.print();

            //end game
            if (this.endGame(board.getAsAt(giliran), 100)) {
                lanjut = false;
                if (giliran == 0) {
                    System.out.println("Player 1 win");
                } else {
                    System.out.println("Player 2 win");
                }
            } else {
                giliran++;
                if (giliran ==2) {
                    giliran = 0;
                }
            }

        //tampilkan siapa yg menang
        }

    }
}
