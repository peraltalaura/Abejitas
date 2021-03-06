/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package view.Frames;

import java.awt.Toolkit;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.WindowAdapter;
import java.awt.event.WindowEvent;
import java.io.IOException;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Date;
import javax.swing.JOptionPane;
import javax.swing.Timer;

/**
 *
 * @author uribe.markel
 */
public class Home extends javax.swing.JFrame {

    Timer updateTimer;
    int DELAY = 100;

    /**
     * Creates new form nhome
     */
    public Home() throws IOException {

        initComponents();
        this.setIconImage(Toolkit.getDefaultToolkit().getImage(getClass()
                .getClassLoader().getResource("bee-iconn.jpg")));
        updateTimer = new Timer(DELAY, new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                Date currentTime = new Date();
                String formatTimeStr = "hh:mm:ss";
                DateFormat formatTime = new SimpleDateFormat(formatTimeStr);
                String formattedTimeStr = formatTime.format(currentTime);

                jLabelTime.setText(formattedTimeStr);

                setTitle("Time: " + formattedTimeStr);

            }
        });
       
        updateTimer.start();
        
        //Adds a window listener to detect when the exit button is clicked and display a confirmation dialog
        addWindowListener(new WindowAdapter() {
            @Override
            public void windowClosing(WindowEvent e) {
                int confirmed = JOptionPane.showConfirmDialog(null,
                        "Are you sure you want to exit?", "Exit Erlete App",
                        JOptionPane.YES_NO_OPTION);

                if (confirmed == JOptionPane.YES_OPTION) {
                    dispose();
                }
            }
        });
        //jLabelImage = new JLabel(new ImageIcon("C:\\Users\\kalboetxeaga.ager\\Downloads\\Boton_Muestra-20210519T060314Z-001\\Abejitas\\Java_App\\src\\PRUEBA.jpg"));

        //setContentPane(new JLabel(new ImageIcon("C:\\Users\\kalboetxeaga.ager\\Downloads\\Boton_Muestra-20210519T060314Z-001\\Abejitas\\Java_App\\src\\Prueba.jpg")));
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        button1 = new view.frameComponents.Button();
        jLabel1 = new javax.swing.JLabel();
        MEMBERS = new view.frameComponents.Button();
        PAYMENTS = new view.frameComponents.Button();
        INVENTORY = new view.frameComponents.Button();
        COMMENTS = new view.frameComponents.Button();
        AVAILABILITY = new view.frameComponents.Button();
        NOTIFICATIONS = new view.frameComponents.Button();
        jPanel1 = new javax.swing.JPanel();
        jLabel3 = new javax.swing.JLabel();
        members = new javax.swing.JLabel();
        jLabelImage = new javax.swing.JLabel();
        jLabelTime = new javax.swing.JLabel();

        button1.setText("button1");

        setDefaultCloseOperation(javax.swing.WindowConstants.DO_NOTHING_ON_CLOSE);
        setTitle("ERLETE Home");
        setBackground(new java.awt.Color(255, 255, 153));
        setForeground(new java.awt.Color(255, 255, 153));
        getContentPane().setLayout(new org.netbeans.lib.awtextra.AbsoluteLayout());

        jLabel1.setFont(new java.awt.Font("Segoe Script", 1, 36)); // NOI18N
        jLabel1.setForeground(new java.awt.Color(255, 255, 255));
        jLabel1.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel1.setText("ERLETE");
        jLabel1.setToolTipText("");
        getContentPane().add(jLabel1, new org.netbeans.lib.awtextra.AbsoluteConstraints(240, 30, 280, 55));

        MEMBERS.setBorder(null);
        MEMBERS.setForeground(new java.awt.Color(255, 255, 255));
        MEMBERS.setText("MANAGE MEMBERS");
        MEMBERS.setGradientLineColor(new java.awt.Color(255, 0, 255));
        MEMBERS.setLineColor(new java.awt.Color(0, 0, 255));
        MEMBERS.setLinePainted(true);
        MEMBERS.setRounded(true);
        getContentPane().add(MEMBERS, new org.netbeans.lib.awtextra.AbsoluteConstraints(300, 210, 169, 29));

        PAYMENTS.setBorder(null);
        PAYMENTS.setForeground(new java.awt.Color(255, 255, 255));
        PAYMENTS.setText("MANAGE PAYMENTS");
        PAYMENTS.setGradientLineColor(new java.awt.Color(255, 0, 255));
        PAYMENTS.setLineColor(new java.awt.Color(0, 0, 255));
        PAYMENTS.setLinePainted(true);
        PAYMENTS.setRounded(true);
        getContentPane().add(PAYMENTS, new org.netbeans.lib.awtextra.AbsoluteConstraints(60, 260, 169, 29));

        INVENTORY.setBorder(null);
        INVENTORY.setForeground(new java.awt.Color(255, 255, 255));
        INVENTORY.setText("MANAGE INVENTORY");
        INVENTORY.setGradientLineColor(new java.awt.Color(255, 0, 255));
        INVENTORY.setLineColor(new java.awt.Color(0, 0, 255));
        INVENTORY.setLinePainted(true);
        INVENTORY.setRounded(true);
        getContentPane().add(INVENTORY, new org.netbeans.lib.awtextra.AbsoluteConstraints(60, 210, 169, 29));

        COMMENTS.setBackground(new java.awt.Color(153, 153, 153));
        COMMENTS.setBorder(null);
        COMMENTS.setForeground(new java.awt.Color(255, 255, 255));
        COMMENTS.setText("MANAGE COMMENTS");
        COMMENTS.setGradientLineColor(new java.awt.Color(255, 0, 255));
        COMMENTS.setLineColor(new java.awt.Color(0, 0, 255));
        COMMENTS.setLinePainted(true);
        COMMENTS.setRounded(true);
        getContentPane().add(COMMENTS, new org.netbeans.lib.awtextra.AbsoluteConstraints(300, 260, 169, 29));

        AVAILABILITY.setBorder(null);
        AVAILABILITY.setForeground(new java.awt.Color(255, 255, 255));
        AVAILABILITY.setText("SEE AVAILABILITY");
        AVAILABILITY.setGradientLineColor(new java.awt.Color(255, 0, 255));
        AVAILABILITY.setLineColor(new java.awt.Color(0, 0, 255));
        AVAILABILITY.setLinePainted(true);
        AVAILABILITY.setRounded(true);
        getContentPane().add(AVAILABILITY, new org.netbeans.lib.awtextra.AbsoluteConstraints(560, 210, 169, 29));

        NOTIFICATIONS.setBorder(null);
        NOTIFICATIONS.setForeground(new java.awt.Color(255, 255, 255));
        NOTIFICATIONS.setText("SEE NOTIFICATIONS");
        NOTIFICATIONS.setGradientLineColor(new java.awt.Color(255, 0, 255));
        NOTIFICATIONS.setLineColor(new java.awt.Color(0, 0, 255));
        NOTIFICATIONS.setLinePainted(true);
        NOTIFICATIONS.setRounded(true);
        getContentPane().add(NOTIFICATIONS, new org.netbeans.lib.awtextra.AbsoluteConstraints(560, 260, 169, 29));

        jPanel1.setBorder(new javax.swing.border.LineBorder(new java.awt.Color(0, 0, 0), 1, true));

        jLabel3.setFont(new java.awt.Font("Segoe Print", 1, 11)); // NOI18N
        jLabel3.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel3.setText("MEMBERS:");

        members.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        members.setBorder(new javax.swing.border.LineBorder(new java.awt.Color(0, 0, 0), 1, true));

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jLabel3, javax.swing.GroupLayout.PREFERRED_SIZE, 77, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(members, javax.swing.GroupLayout.PREFERRED_SIZE, 34, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(27, Short.MAX_VALUE))
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
                .addContainerGap(17, Short.MAX_VALUE)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabel3, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(members, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.PREFERRED_SIZE, 30, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap())
        );

        getContentPane().add(jPanel1, new org.netbeans.lib.awtextra.AbsoluteConstraints(300, 110, 160, 60));

        jLabelImage.setIcon(new javax.swing.ImageIcon(getClass().getResource("/panal3_.jpg"))); // NOI18N
        getContentPane().add(jLabelImage, new org.netbeans.lib.awtextra.AbsoluteConstraints(0, 0, 800, 340));

        jLabelTime.setText("jLabel2");
        getContentPane().add(jLabelTime, new org.netbeans.lib.awtextra.AbsoluteConstraints(50, 50, 130, 30));

        pack();
    }// </editor-fold>//GEN-END:initComponents

    /**
     * @param args the command line arguments
     * @return
     */
//    public static void main(String args[]) {
//        /* Set the Nimbus look and feel */
//        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
//        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
//         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
//         */
//        try {
//            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
//                if ("Nimbus".equals(info.getName())) {
//                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
//                    break;
//                }
//            }
//        } catch (ClassNotFoundException ex) {
//            java.util.logging.Logger.getLogger(Home.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
//        } catch (InstantiationException ex) {
//            java.util.logging.Logger.getLogger(Home.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
//        } catch (IllegalAccessException ex) {
//            java.util.logging.Logger.getLogger(Home.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
//        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
//            java.util.logging.Logger.getLogger(Home.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
//        }
//        //</editor-fold>
//        //</editor-fold>
//
//        /* Create and display the form */
//        java.awt.EventQueue.invokeLater(new Runnable() {
//            public void run() {
//                new Home().setVisible(true);
//            }
//        });
//    }
    public static Home createView() throws IOException {
        Home v = new Home();
        return v;
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    public view.frameComponents.Button AVAILABILITY;
    public view.frameComponents.Button COMMENTS;
    public view.frameComponents.Button INVENTORY;
    public view.frameComponents.Button MEMBERS;
    public view.frameComponents.Button NOTIFICATIONS;
    public view.frameComponents.Button PAYMENTS;
    private view.frameComponents.Button button1;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabelImage;
    private javax.swing.JLabel jLabelTime;
    private javax.swing.JPanel jPanel1;
    public javax.swing.JLabel members;
    // End of variables declaration//GEN-END:variables
}
