
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
public class Dadu {

    public int maxValue;

    public Dadu(int maxV) {
        this.maxValue = maxV;
    }

    public int getMaxValue() {
        return maxValue;
    }

    public void setMaxValue(int maxValue) {
        this.maxValue = maxValue;
    }

    public int roll() {
        Random rd = new Random();
        return rd.nextInt(this.getMaxValue()) + 1;
    }

}
