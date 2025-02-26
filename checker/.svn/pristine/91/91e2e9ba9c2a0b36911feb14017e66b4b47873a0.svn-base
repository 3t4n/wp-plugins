import React, {Component} from 'react'
import Button from './Button'
import { connect } from 'react-redux';
import axios from 'axios';
import { addAllTask } from '../state/actionCreators';

class ImportPopup extends Component{

    constructor(props) {
        super(props);
        this.state = {
            isPopupOpen: false,
            tasks_file: null
        };
    }

    importTasks = (e) => {
        e.preventDefault();
        
        let requestBody = {
            tasks_file: this.state.tasks_file
        }
    
        axios.post(this.props.url + '/wp-json/checker/v1/chkr_task/import/', requestBody, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-WP-Nonce': wpApiSettings.nonce,
            }
        })
        .then((response) => {
            if(response.data.error) {
                console.log(response.data.error)
            } else {
                this.closePopup();
                this.props.add_all_tasks(response.data.tasks);
            }
        })
        .catch((error) => {
            console.error('Error creating task:', error);
        });
    } 

    closePopup = () => {
        this.props.onClose();
        this.setState((prevState) => {
            return({
                ...prevState,
                tasks_file: null,
                isPopupOpen: false
            })
        })
        document.querySelector('#chkr-import-task-pp input').value =null
    }

    openPopup = () => {
        this.setState((prevState) => {
            return({
                ...prevState,
                isPopupOpen: true
            })
        })
    }

    updateFileInput = (e)=> {
        let file = e.target.files[0];
        this.setState((prevState) => {
            return({
                ...prevState,
                tasks_file: file
            })
        })
    }

    render() {
        let sampleData = [
            {"task_id":"2419","task_title":"Sample task2","task_content":"Sample description 2","task_priority":"high","task_labels":"sample","task_due_date":"2023-10-25","task_status":"pending"},
            {"task_id":"2417","task_title":"Sample Task 1","task_content":"Sample description 1","task_priority":"low","task_labels":"sample","task_due_date":"2023-10-25","task_status":"pending"}
        ]
        let url = window.URL.createObjectURL(new Blob([JSON.stringify(sampleData)]));
        return (
            <div id="chkr-import-task-pp" className={"chkr-popup " + (this.state.isPopupOpen ? '' : 'chkr-hidden')}>
                <h1 className='chkr-pp-heading'>Import Tasks</h1>
                <p>Please upload a JSON file with given format.</p>
                <div>
                    <input type="file" name="task_file" accept='.json' onChange={this.updateFileInput}/>
                    <Button download="Sample.json" href={url} name="Download Sample" />
                </div>
                <div>
                    <Button name= "Import Tasks" eventHandler={this.importTasks}/>
                    <Button name= "Cancel" eventHandler={this.closePopup}/>
                </div>
            </div>
          )
    }

}


const mapStateToProps = (state) => {
    return (
        {
            url: state.url
        }
    )
}

const mapDispatchToProps = (dispatch) => {
    return (
        {
            add_all_tasks: (arr)=> {dispatch(addAllTask(arr))},
        }
    )
}

export default connect(mapStateToProps,mapDispatchToProps, null, {forwardRef: true} )(ImportPopup);

