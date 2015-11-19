/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * kelas yang merepresentasikan setiap titik-titik pada board
 *
 * @author i14032
 */
public class Planet {

    /**
     * atribut x dan y untuk akses
     */
    private int x;
    private int y;

    private int locate;
    private SpaceWarpGate warp = null;
    //private SpaceWarpGate warpOut=null;
    private BlackHole hole = null;
    //private BlackHole holeOut=null;

    public Planet(int x, int y, int locate) {
        this.x = x;
        this.y = y;
        this.locate = locate;
    }

    public void setXPl(int x) {
        this.x = x;
    }

    public void setYPl(int y) {
        this.y = y;
    }

    public void setLocatePl(int y, int x) {
        if (y % 2 != 0) {
            this.locate = (9 - y) * 10 + x;
            //System.out.println("ksini");
        } else {
            this.locate = (9 - y) * 10 + (9 - x);
        }

    }

    public void setWarpPl(SpaceWarpGate warpIn) {
        this.warp = warpIn;
    }

    public void setHolePl(BlackHole holeIn) {
        this.hole = holeIn;
    }

    public int getXPl() {
        return x;
    }

    public int getYPl() {
        return y;
    }

    public int getLocatePl() {
        return locate;
    }

    public SpaceWarpGate getWarpPl() {
        return warp;
    }

    public BlackHole getHolePl() {
        return hole;
    }

}
