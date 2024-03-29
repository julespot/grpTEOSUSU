package Java.modele.basededonnees;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

import Java.controleur.actions.ActionSupprActu;
import Java.controleur.actions.ActionValiderActu;

public class RequeteBddActualites {

    private ConnectionBdd dbConnection;
    private ActionValiderActu actionValiderActu;
    private ActionSupprActu actionSupprActu;
    
    public RequeteBddActualites(){
        this.dbConnection = new ConnectionBdd();
    }

    public void publierActu(ActionValiderActu actionValiderActu){
        this.actionValiderActu = actionValiderActu;
        dbConnection.openConnection();
        try {
            String sql = "INSERT INTO `Actualites`(`nom`, `description`, `premièreImage`, `secondeImage`, `troisiemeImage`, `quatriemeImage`,`date`) VALUES (?,?,?,?,?,?,?)";
            PreparedStatement stmt = dbConnection.getConnection().prepareStatement(sql);
            stmt.setString(1, this.actionValiderActu.getPanneauActualites().getTitle());
            stmt.setString(2, this.actionValiderActu.getPanneauActualites().getDescription());
            stmt.setString(3, this.actionValiderActu.getPanneauActualites().getPathImage1());
            stmt.setString(4, this.actionValiderActu.getPanneauActualites().getPathImage2());
            stmt.setString(5, this.actionValiderActu.getPanneauActualites().getPathImage3());
            stmt.setString(6, this.actionValiderActu.getPanneauActualites().getPathImage4());
            stmt.setDate(7, this.actionValiderActu.getDate());
            stmt.executeUpdate();
        } catch (SQLException e) {
            e.printStackTrace();
        } finally {
            dbConnection.closeConnection();
        }
    }

    public List<String>  getTitre(){
        dbConnection.openConnection();
        List<String> listTitre = new ArrayList<>();
        try {
            String query = "SELECT nom FROM Actualites";
            PreparedStatement stmt = dbConnection.getConnection().prepareStatement(query);
            ResultSet rs = stmt.executeQuery();
            while (rs.next()) {
                listTitre.add(rs.getString("nom"));
            }
        } catch (SQLException e) {
            e.printStackTrace();
        } finally {
            dbConnection.closeConnection();
        }
        return listTitre;
    }

    public List<String>  getDescr(){
        dbConnection.openConnection();
        List<String> listDescr = new ArrayList<>();
        try {
            String query = "SELECT description FROM Actualites";
            PreparedStatement stmt = dbConnection.getConnection().prepareStatement(query);
            ResultSet rs = stmt.executeQuery();
            while (rs.next()) {
                listDescr.add(rs.getString("description"));
            }
        } catch (SQLException e) {
            e.printStackTrace();
        } finally {
            dbConnection.closeConnection();
        }
        return listDescr;
    }

    public List<String>  getDate(){
        dbConnection.openConnection();
        List<String> listDate = new ArrayList<>();
        try {
            String query = "SELECT date FROM Actualites";
            PreparedStatement stmt = dbConnection.getConnection().prepareStatement(query);
            ResultSet rs = stmt.executeQuery();
            while (rs.next()) {
                listDate.add(rs.getString("date"));
            }
        } catch (SQLException e) {
            e.printStackTrace();
        } finally {
            dbConnection.closeConnection();
        }
        return listDate;
    }

    public List<Integer>  getId(){
        dbConnection.openConnection();
        List<Integer> listId = new ArrayList<>();
        try {
            String query = "SELECT id FROM Actualites";
            PreparedStatement stmt = dbConnection.getConnection().prepareStatement(query);
            ResultSet rs = stmt.executeQuery();
            while (rs.next()) {
                listId.add(rs.getInt("id"));
            }
        } catch (SQLException e) {
            e.printStackTrace();
        } finally {
            dbConnection.closeConnection();
        }
        return listId;
    }

    public void supprActu(ActionSupprActu actionSupprActu){
        this.actionSupprActu = actionSupprActu;
        dbConnection.openConnection();
        try {
            String query = "DELETE FROM Actualites WHERE id = ?";
            PreparedStatement stmt = dbConnection.getConnection().prepareStatement(query);
            stmt.setInt(1, this.actionSupprActu.getIndex());
            stmt.executeUpdate();
        } catch (SQLException e) {
            e.printStackTrace();
        } finally {
            dbConnection.closeConnection();
        }
    }
}
