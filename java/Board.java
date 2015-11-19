/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author i14032
 */
public class Board {

    private int numBH;
    private int numWG;
    private int numAs;
    public Dadu dice;

    private Planet[][] arrPl = new Planet[10][10];
    private SpaceWarpGate[] arrWG;
    private BlackHole[] arrBH;
    private Astronot[] arrAs;

    public Board(int maxDadu, int wg, int bh, int as) {
        this.numAs = as;
        this.numBH = bh;
        this.numWG = wg;
        arrWG = new SpaceWarpGate[numWG];
        arrBH = new BlackHole[numBH];
        arrAs = new Astronot[numAs];
        dice = new Dadu(maxDadu);
        int locate = 1;
        for (int i = 0; i < 10; i++) {
            for (int j = 0; j < 10; j++) {
                arrPl[i][j] = new Planet(i, j, locate);
                //locate++;
                arrPl[i][j].setLocatePl(i, j);
            }
        }
    }

    public void addBlackHole(int idx, BlackHole b) {
        arrBH[idx] = b;
    }

    public void addWarper(int idx, SpaceWarpGate w) {
        arrWG[idx] = w;
    }

    public void addAstronot(int idx, Astronot a) {
        arrAs[idx] = a;
    }

    public int getNumBH() {
        return arrBH.length;
    }

    public int getNumAs() {
        return arrAs.length;
    }

    public int getNumWG() {
        return arrWG.length;
    }

    public Astronot getAsAt(int idx) {
        return arrAs[idx];
    }

    public BlackHole getBH(int idx) {
        return arrBH[idx];
    }

    public SpaceWarpGate getWG(int idx) {
        return arrWG[idx];
    }

    public Planet getPlanet(int idxy, int idxx) {
        return arrPl[idxy][idxx];
    }

}
