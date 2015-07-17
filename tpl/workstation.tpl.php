
<div>
	<table width="100%" class="border">
		<tr><td width="20%">Libellé</td><td>[ws.name; strconv=no]</td></tr>
		<tr><td width="20%">[onshow;block=tr;when [view.isMachine]==0]Groupe d'utilisateurs</td><td>[ws.fk_usergroup; strconv=no]</td></tr>
		<tr><td width="20%">Type</td><td>[ws.type; strconv=no]</td></tr>
		<tr><td width="20%">Nombre d'heures maximales</td><td>[ws.nb_hour_capacity; strconv=no]</td></tr>
		<tr><td>Nombre d'heures avant production</td><td>[ws.nb_hour_before; strconv=no]h</td></tr>
		<tr><td>Nombre d'heures après production</td><td>[ws.nb_hour_after; strconv=no]h</td></tr>


	    <tr><td width="20%">Nombre de ressources disponibles</td><td>[ws.nb_ressource; strconv=no]</td></tr>
        <tr><td>[onshow;block=tr;when [view.isMachine]==0]THM</td><td>[ws.thm; strconv=no]</td></tr>
        <tr><td width="20%">THM Machine</td><td>[ws.thm_machine; strconv=no]</td></tr>
        <tr><td width="20%">Couleur de colonne</td><td>[ws.background; strconv=no]</td></tr>
	</table>
</div>


[onshow;block=begin;when [view.mode]!='edit']
    <div class="tabsAction">
        <a href="?id=[ws.id]&action=edit" class="butAction">Modifier</a>
        <span class="butActionDelete" id="action-delete"  
        onclick="if (window.confirm('Voulez vous supprimer l\'élément ?')){document.location.href='?id=[ws.id]&action=delete'};">Supprimer</span>
    </div>
[onshow;block=end]  

[view.scheduleTitle;strconv=no;]
<div style="margin-top:15px;">
    <table width="100%" class="border">     
        <tr class="liste_titre">
            <th align="left" width="10%">Date</th>
            <th>Ou jour de la semaine</th>
            <th>Période de la journée</th>
            <th>Nombre de ressource indisponible</th>
            <th>&nbsp;</th>
        </tr>
        
        <tr style="background-color:#fff;">
            <td>[TWorkstationSchedule.date_off;block=tr;strconv=no]</td>
            <td>[TWorkstationSchedule.week_day;strconv=no]</td>
            <td>[TWorkstationSchedule.day_moment;strconv=no]</td>
            <td>[TWorkstationSchedule.nb_ressource;strconv=no]</td>
            <td align="center">[TWorkstationSchedule.action;strconv=no]</td>
        </tr>
        
        <tr>
            <td colspan="4" align="center">[TWorkstationSchedule;block=tr;nodata]Aucun temps plannifié</td>
        </tr>
    </table>    
</div>



[onshow;block=begin;when [view.mode]=='edit']
    <div class="tabsAction" style="text-align:center;">
        <input type="submit" value="Enregistrer" name="save" class="button"> 
        &nbsp; &nbsp; <input type="button" value="Annuler" name="cancel" class="button" onclick="document.location.href='?action=view&id=[ws.id]'">
    </div>
[onshow;block=end]


[onshow;block=begin;when [view.conf_defined_task]==1]
	[onshow;block=begin;when [view.editTask]=='1']
		<div style="margin-top:15px;">
			<!-- déjà un formulaire, à recoder <form action="[view.actionForm;strconv=no]" method="POST">
				<input type="hidden" name="action" value="editTaskConfirm" />
				<input type="hidden" name="id" value="[ws.id]" />
				<input type="hidden" name="id_task" value="[formTask.id_task;noerr]" />
				-->
				<table width="100%" class="border">
					<tr><th align="left" colspan="2">[formTask.id_task;noerr;if [val]==0;then 'Ajouter une tâche';else 'Modifier la tâche']</th></tr>
					<tr><td>Libellé</td><td><input size="45" type="text" name="libelle" value="[formTask.libelle;noerr;strconv=no]" /></td></tr>
					<tr><td>Description</td><td><textarea cols="45" rows="3" name="description">[formTask.description;noerr;strconv=no]</textarea></td></tr>
				</table>
				
				<div class="tabsAction" style="text-align:center;">
					<input class="button" type="submit" value="Enregistrer" />
					<a style="font-weight:normal;text-decoration:none" href="?action=view&id=[ws.id]" class="button">Annuler</a>
				</div>
			<!-- </form> -->
		</div>
	[onshow;block=end]
[onshow;block=end]	

[onshow;block=begin;when [view.conf_defined_task]==1]
	<div style="margin-top:15px;">
		<table width="100%" class="border">		
			<tr height="40px;">
				<td colspan="4">&nbsp;&nbsp;<b>Tâches associés</b></td>
			</tr>
			<tr style="background-color:#dedede;">
				<th align="left" width="10%">&nbsp;&nbsp;Tâche</th>
				<th align="left" width="30%">&nbsp;&nbsp;Description</th>
				<th align="center" width="5%">&nbsp;&nbsp;Action</th>
			</tr>
			
			<tr style="background-color:#fff;">
				<td>&nbsp;&nbsp;[wst.libelle;strconv=no;block=tr]</td>
				<td>[wst.description;strconv=no;block=tr]</td>
				<td align="center">[wst.action;strconv=no;block=tr]</td>
			</tr>
			
			<tr>
				<td colspan="4" align="center">[wst;block=tr;nodata]Aucune tâche associée</td>
			</tr>
		</table>	
	</div>
[onshow;block=end]

[onshow;block=begin;when [view.mode]!='edit']
	<div class="tabsAction">
		[onshow;block=begin;when [view.conf_defined_task]==1]
			<a href="?id=[ws.id]&action=editTask" class="butAction">Ajouter une tâche</a>
		[onshow;block=end]
	</div>
[onshow;block=end]	


<div style="clear:both"></div>

