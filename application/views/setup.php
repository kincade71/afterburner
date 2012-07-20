<div class="doc_create_form">
	<h2>Welcome to Afterburner!</h2>
    <p>An Afterburner is used to add thrust to an already existing engine.  As documentation is normally done after the fact (come on now, don't kid yourself), this tool is used to speed up the generation of Codeigniter-style documentation.  You'll find AB surprisingly simple, but if you have ever used the CI User Guide as a template for documentation you'll also find that it fills a space that was heretofore unoccupied.  Do what you said you would do months or even years ago:  document your work for your users and developers.</p>
	<h2>Set up steps:</h2>
	<ul>
    	<li>Status Check:
        	<ul>
            	<li>Is your database connected: ?
                	<?= (isset($this->db->conn_id) && is_resource($this->db->conn_id))?'<span class="green">YES</span>':'<span class="red">NO</span>' ?>
                </li>
            </ul>
        </li>
    	<li>Database:
        	<ul>
            	<li>Create Database & Tables</li>
            </ul>
        </li>
    	<li>Customize:
        	<ul>
            	<li>Upload Documentation Logo</li>
    			<li>Upload Documentation Logo</li>
            </ul>
        </li>
    </ul>
</div>