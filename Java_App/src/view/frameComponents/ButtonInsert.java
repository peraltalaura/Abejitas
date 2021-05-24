package view.frameComponents;


import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.RenderingHints;
import java.awt.Shape;
import java.awt.geom.Rectangle2D;
import java.awt.*;
import java.awt.event.MouseEvent;
import java.awt.event.MouseListener;
import java.awt.geom.RoundRectangle2D;
import javax.swing.JButton;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 *
 * @author agerk
 */


    //note: the file must be compiled in order to drag into the JFrame
    //this works as "homemade" jbutton so drag directly into the design of the jFrame
public class ButtonInsert extends JButton implements MouseListener {

    private boolean rounded;
    private boolean backgroundPainted;
    private boolean linePainted;
    private boolean entered;
    private boolean pressed;

    private Color enteredColor;
    private Color pressedColor;
    private Color gradientBackgroundColor;
    private Color gradientLineColor;
    private Color lineColor;
    private Color defaultColor;
    private Color defaulteGradientLine[];

    public ButtonInsert() {
        super();//inicializamos como un boton normal.
        rounded = false;
        backgroundPainted = false;
        linePainted = false;
        entered = false;
        pressed = false;
        this.setCursor(new Cursor(Cursor.HAND_CURSOR));//cursor de tipo "boton"
        enteredColor = getBackground().brighter();
        pressedColor = getBackground().darker();
        lineColor = Color.BLACK; //color predeterminado de la linea
        setContentAreaFilled(false);
        setFocusPainted(false);
        addMouseListener(this); //añadimos el mouse listener
        defaultColor = this.getBackground();
        defaulteGradientLine= this.getLineColor();
        
        
        
        
    }
    /**
     * This method overrides the setBackround() function 
     * in order to allow as to make the gradient
     * @param backgroundColor 
     */
    @Override
    public void setBackground(Color backgroundColor) {
        super.setBackground(backgroundColor);
        enteredColor = backgroundColor.brighter();
        pressedColor = backgroundColor.darker();
    }
    /**
     * This method takes a graphics object and paints the button using that object
     * @param g 
     */
    @Override
    protected void paintComponent(Graphics g) {
        Graphics2D g2 = (Graphics2D) g;
        g2.setRenderingHint(RenderingHints.KEY_ANTIALIASING, RenderingHints.VALUE_ANTIALIAS_ON);

        Shape s = (rounded) ? new RoundRectangle2D.Float(1, 1, getWidth() - 2, getHeight() - 2, getHeight() - 2, getHeight() - 2)
                : new Rectangle2D.Float(1, 1, getWidth() - 2, getHeight() - 2);

        if (backgroundPainted || (pressed && !backgroundPainted)) {
            if (gradientBackgroundColor == null) {
                g2.setColor(color());
            } else {
                GradientPaint paint = new GradientPaint(0, 0, getBackground(), getWidth(), getHeight(), gradientBackgroundColor);
                g2.setPaint(paint);
            }
            g2.fill(s);
        }
        if (linePainted) {
            if (gradientLineColor == null) {
                g2.setColor(isEnabled() ? lineColor : new Color(204, 204, 204));
            } else {
                GradientPaint paint = new GradientPaint(0, 0, lineColor, getWidth(), getHeight(), gradientLineColor);
                g2.setPaint(paint);
            }
            g2.draw(s);
        }
        super.paintComponent(g);
    }
    //color class
    private Color color() {
        if (!isEnabled()) {
            return new Color(204, 204, 204); 
        }
        Color tmp = getBackground();
        if (pressed) {
            return pressedColor;
        }
        if (entered) {
            return enteredColor;
        }
        return tmp;

    }
    
    public void setRounded(boolean rounded) {
        this.rounded = rounded;
    }

    public void setBackgroundPainted(boolean backgroundPainted) {
        this.backgroundPainted = backgroundPainted;
    }

    public void setLinePainted(boolean linePainted) {
        this.linePainted = linePainted;
    }

    public void setEnteredColor(Color enteredColor) {
        this.enteredColor = enteredColor;
    }

    public void setPressedColor(Color pressedColor) {
        this.pressedColor = pressedColor;
    }

    public void setGradientBackgroundColor(Color gradientBackgroundColor) {
        this.gradientBackgroundColor = gradientBackgroundColor;
    }

    public void setGradientLineColor(Color gradientLineColor) {
        this.gradientLineColor = gradientLineColor;
    }

    public void setLineColor(Color lineColor) {
        this.lineColor = lineColor;
    }

    @Override
    public void mouseClicked(MouseEvent me) {

    }

    @Override
    public void mousePressed(MouseEvent me) {
        pressed = true;
        
    }

    @Override
    public void mouseReleased(MouseEvent me) {
        pressed = false;
        
    }
    
    @Override
    public void mouseEntered(MouseEvent me) {
        entered = true;
        this.setBackground(Color.green.brighter());
        this.setLineColor(Color.green);
        this.setGradientLineColor(Color.black);
        
        
        //this.setBackground((Color.red).brighter());
    }

    @Override
    public void mouseExited(MouseEvent me) {
        entered = false;
         this.setLineColor(this.defaulteGradientLine[0]);
         this.setGradientLineColor(this.defaulteGradientLine[1]);
         this.setBackground(defaultColor);
    }
    public Color[] getLineColor(){
        Color[] colors = {this.lineColor, this.gradientLineColor};
        return colors;
    }
}
