/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author i14032
 */
public class Astronot {

    private String name;
    private int x = 0;
    private int y = 9;
    private int locate;
    private boolean isWin = false;

    public Astronot(String name) {
        this.name = name;
    }

    public String getName() {
        return name;
    }

    public int getXAs() {
        return x;
    }

    public int getYAs() {
        return y;
    }

    public int getLocateAs() {
        return this.locate+1;
    }

    public boolean isWinAs() {
        return isWin;
    }

    public void setName(String name) {
        this.name = name;
    }

    public void setXAs(int x) {
        this.x = x;
    }

    public void setYAs(int y) {
        this.y = y;
    }

    public void setLocateAs() {
        if (this.y % 2 == 0) {
            //System.out.println("ini");
            this.locate = (9 - this.y) * 10 + (9 - this.x);

        } else {
            //System.out.println("itu"+this.x+" "+this.y);
            this.locate = (9 - this.y) * 10 + this.x;
        }

    }

    public void setWinAs(boolean isWin) {
        this.isWin = isWin;
    }

    public void move() {
        //saat x=9 maka y mines 1
        if (this.getYAs() % 2 != 0) {
            if (this.getXAs() < 9) {
                this.setXAs(x + 1);
                //this.setLocateAs(locate+1);
            } else {

                this.setYAs(y - 1);
                //this.setLocateAs(locate+1);
            }
        } else {
            if (this.getXAs() > 0) {
                this.setXAs(x - 1);
                //this.setLocateAs(locate+1);
            } else {

                this.setYAs(y - 1);
                //this.setLocateAs(locate+1);
            }
        }

    }

    public void moveBackward(int dadu) {
        this.setXAs(dadu-this.getXAs());
        
    }

    public boolean isWin() {
        if (this.getLocateAs() == 100) {
            return true;
        } else {
            return false;
        }
    }

}
