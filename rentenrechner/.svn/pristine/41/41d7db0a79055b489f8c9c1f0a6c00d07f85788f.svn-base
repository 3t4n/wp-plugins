<div id="calculator_wrapper">
	<div id="mq-test"></div>
	<h1>Rentenrechner</h1>
	<div id="parameter">
	    <form>
	        <div id="parameter-einkommen-ausgaben">
	            <div id="parameter-einkommen"> <span>Dein Netto-Einkommen:</span>
	                <input id="parameter-einkommen-input" class="parameter-input" type="text" value="30000" name="einkommen" autocomplete="off">
	                <div class="clearfloat"></div>
	            </div>
	            <div id="parameter-einkommen"><span>Deine Ausgaben (im Jahr):</span>
	                <input id="parameter-ausgaben-input" class="parameter-input" type="text" value="12000" name="ausgaben" autocomplete="off">
	                <div class="clearfloat"></div>
	            </div>
	        </div>
	        <div id="parameter-sparen">
	            <div id="parameter-sparrate"> <span>Soviel sparst du im Jahr:</span>
	                <input id="parameter-sparrate-input" class="parameter-input" type="text" value="18000" name="sparrate" autocomplete="off">
	                <div class="clearfloat"></div>
	            </div>
	            <div id="parameter-sparquote"><span>Deine Sparquote</span>
	                <input id="parameter-sparquote-input" class="parameter-input" type="text" value="60" name="sparquote" autocomplete="off">
	                <div class="clearfloat"></div>
	            </div>
	        </div>
	        <input type="button" id="button-submit" value="Berechnen" />
	        <div id="optionen-toggle" class="toggle"><img src="<?php echo plugin_dir_url( __FILE__ ); ?>img/ic_setting.png" width="18" height="18" />Erweitert <span style="clear:both" id="chevron">▾</span></div>
	    </form>
	    <div id="optionen">
	        <div id="parameter-vermoegen"> <span>Aktuelles Vermögen</span>
	            <input id="parameter-vermoegen-input" class="parameter-input" type="text" value="0" name="vermoegen" autocomplete="off">
	            <div class="clearfloat"></div>
	        </div>
	        <div id="parameter-rendite"> <span>Jährliche Rendite</span>
	            <input id="parameter-rendite-input" class="parameter-input" type="text" value="5" name="rendite" autocomplete="off">
	            <div class="clearfloat"></div>
	        </div>
	        <div id="parameter-withdrawal"><span>Entnahmerate (SWR)</span>
	            <input id="parameter-withdrawal-input" class="parameter-input" type="text" value="4" name="withdrawal" autocomplete="off">
	            <div class="clearfloat"></div>
	        </div>
	    </div>
	</div>
	
	<div id="result-small"><span class="years-to-retirement-text"><div class="years-to-retirement-title">Du kannst in Rente gehen:</div>In <span class="years-to-retirement">0.0</span> Jahren
	    <br> </span> <span class="savingsrate-text">bei einer Sparquote von <span class="savingsrate">60</span><span class="savingrate-suffix">%</span></span>
	</div>
	<div id="graph">
	    <div id="result"> <span class="years-to-retirement-text"><div class="years-to-retirement-title">Du kannst in Rente gehen:</div>In <span class="years-to-retirement">0.0</span> Jahren
	        <br> </span> <span class="savingsrate-text">bei einer Sparquote von <span class="savingsrate">60</span><span class="savingrate-suffix">%</span></span>
	    </div>
	    <div id="axis-x-label" class="axis-label">Sparquote (in %)</div>
	    <div id="axis-y-label" class="axis-label">Jahre bis zur Rente</div>
	    <div id="graph-background-container">
	        <div id="years-overlay">188,8 Jahre</div>
	        <div id="graph-background"> </div>
	    </div>
	    <div id="graph-content"> </div>
	    <div id="graph-canvas-container">
	        <div id="graph-canvas"></div>
	    </div>
	</div>
	
	<div id="table">
	    <h2><a href=""><img src="<?php echo plugin_dir_url( __FILE__ ); ?>img/Element_1_Kopie_2.svg" width="80" /> </a></h2>
	    <div id="table-inner">
	        <table>
	            <thead>
	                <tr>
	                    <td>Nach Jahr</td>
	                    <td>Ausgaben</td>
	                    <td>Sparrate</td>
	                    <td>Rendite (<span id="returnHead"></span> %)</td>
	                    <td>von SWR abgedeckter Anteil der Ausgaben</td>
	                    <td>Vermögens&#8203;zuwachs</td>
	                    <td>Vermögen</td>
	                </tr>
	            </thead>
	            <tbody> </tbody>
	        </table>
	    </div>
	</div>
</div>
