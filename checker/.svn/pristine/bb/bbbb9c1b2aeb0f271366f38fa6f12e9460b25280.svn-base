import React, { Component } from 'react';
import axios from 'axios'; 
import Button from './Button';
import { connect } from 'react-redux';
import { addTask } from '../state/actionCreators'; 


class TaskPopup extends Component {
    constructor(props) {
        super(props);
        this.state = {
            isPopupOpen: false,
            newTask: {
                name: '',
                priority: '',
                labels: '',
                dueDate: '',
                desc: ''
            },
        };
    }

    handleInputChange = (field, value) => {
        // create a shallow copy of the current newTask object from the component's state.
        const newTask = { ...this.state.newTask };
        newTask[field] = value;

        // update the component's state with the modified newTask object.
        this.setState((prevState) => {
            return ({
                ...prevState,
                newTask: newTask
            })
        });
    }

    handleAddTask = (e) => {
        e.preventDefault();
        
        // Extract the newTask data from the component's state
        const { name, priority, labels, dueDate, desc } = this.state.newTask;
    
        // Define the request body with the task data
        const requestBody = {};
        if(name != '') {
            requestBody.task_title = name;
        }
        if(priority != '') {
            requestBody.task_priority = priority;
        }
        if(labels != '') {
            requestBody.task_labels = labels;
        }
        if(dueDate != '') {
            requestBody.task_due_date = dueDate;
        }
        if(desc != '') {
            requestBody.task_content = desc;
        }
    
        axios.post(this.props.url + '/wp-json/checker/v1/chkr_task/insert/', requestBody, {
            headers: {
                'Content-Type': 'application/json',
                'X-WP-Nonce': wpApiSettings.nonce,
            },
        })
        .then((response) => {
            if(response.data.error) {
                console.log(response.data.error)
            } else {
                this.closePopup();
                this.props.addTask(response.data.task);

                console.log(this.props.task)
                console.log(this.props.complete_tasks)
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
                newTask: {
                    name: '',
                    priority: '',
                    labels: '',
                    dueDate: '',
                    desc: ''
                },
                isPopupOpen: false
            })
        })
    }

    openPopup = () => {
        this.setState((prevState) => {
            return({
                ...prevState,
                isPopupOpen: true
            })
        })
    }
    
    render() {
        return (
            <div className={"chkr_add_task_popup chkr-popup " + (this.state.isPopupOpen ? '' : 'chkr-hidden')} >
                <h1 className='chkr-pp-heading'>Add Task</h1>
                <div className="chkr-add-task-pp-frm">
                    <label>Name:</label>
                    <input
                        type="text"
                        value={this.state.newTask.name}
                        onChange={(e) => this.handleInputChange('name', e.target.value)}
                    />

                    <label>Priority:</label>
                    <select
                        onChange={(e) => this.handleInputChange('priority', e.target.value)}
                    >
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>

                    <label>Labels:</label>
                    <input
                        type="text"
                        value={this.state.newTask.labels}
                        onChange={(e) => this.handleInputChange('labels', e.target.value)}
                    />

                    <label>Due Date:</label>
                    <input
                        type="date"
                        value={this.state.newTask.dueDate}
                        onChange={(e) => this.handleInputChange('dueDate', e.target.value)}
                    />
                    <label>Description:</label>
                    <textarea
                        value={this.state.newTask.desc}
                        onChange={(e) => this.handleInputChange('desc', e.target.value)}
                    >{this.state.newTask.desc}</textarea>

                    <Button name= "Create Task" eventHandler={this.handleAddTask}/>
                    <Button name= "Cancel" eventHandler={this.closePopup}/>

                </div>
               
            </div>
        );
    }
}


const mapStateToProps = (state) => {
    return (
        {
            task: state.task,
            complete_tasks: state.completedTasks,
            url: state.url
        }
    )
}

const mapDispatchToProps = (dispatch) => {
    return (
        {
            addTask: (task_id) => {dispatch(addTask(task_id))} ,


        }
    )
}

export default connect(mapStateToProps,mapDispatchToProps,null, {forwardRef: true} )(TaskPopup);
