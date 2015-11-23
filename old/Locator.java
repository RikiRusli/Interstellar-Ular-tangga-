/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author i14032
 */
public class Locator {

    private int x;
    private int y;
    //private Locator lOut;

    private int xOut;
    private int yOut;

    public Locator(int x, int y, int xOut, int yOut) {
        this.x = x;
        this.y = y;
        this.xOut = xOut;
        this.yOut = yOut;
        //this.lOut=out;
    }
    /*
     public Locator getlOut() {
     return lOut;
     }
     */

    public int getXLc() {
        return x;
    }

    public int getYLc() {
        return y;
    }

    public int getxOutLc() {
        return xOut;
    }

    public int getyOutLc() {
        return yOut;
    }

    public void setXLc(int x) {
        this.x = x;
    }

    public void setYLc(int y) {
        this.y = y;
    }

    public void setxOutLc(int xOut) {
        this.xOut = xOut;
    }

    public void setyOutLc(int yOut) {
        this.yOut = yOut;
    }

    /*
     public void setlOut(Locator lOut) {
     this.lOut = lOut;
     }
     */
    public void relocate(Astronot as) {
        //merubah posisi astronot
        as.setXAs(this.getxOutLc());
        as.setYAs(this.getyOutLc());
    }
}
