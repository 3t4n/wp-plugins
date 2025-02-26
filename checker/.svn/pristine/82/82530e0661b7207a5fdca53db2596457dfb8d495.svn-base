import React, { Component } from 'react';
import axios from 'axios';
import EventHandlers from './EventHandlers';
import TaskContainer from './TaskContainer';
import ToolButton from './ToolButton';
import { completeTask, incompleteTask, remTask, updateTask } from '../state/actionCreators';
import { connect} from 'react-redux';

class Task extends Component {

    constructor(props) {
        super();
        this.state = {
            task: props.taskData,
            isEditable: false,
            accordion: false
        }
    }

    componentDidMount() {

        // axios.get(`${store.getState().url}/wp-json/checker/v1/chkr_task/get/?task_id=${this.props.task_id}`)
        // .then((response) => {
        //     if(response.data.error) {
        //         console.log(response.data.error);
        //     } else {  
        //         this.setState((prevState) => {
        //             return (
        //                 {...prevState, task: response.data.task}
        //             )
        //         });
        //     }
        // })
        // .catch((error) => {
        //     console.error('Error fetching tasks:', error);
        // }); 
      }

    updateStatus = (e) => {
        const task_id = this.props.taskData.task_id;

        let taskState = '';
        if(this.props.taskData.task_status == 'pending') {
            taskState = 'completed';
        } else {
            taskState = 'pending';
        }

        const requestBody = {
            task_id: task_id,
            task_status: taskState
        }

        axios.post(this.props.url + '/wp-json/checker/v1/chkr_task/updateStatus/', requestBody, {
            headers: {
                'Content-Type': 'application/json',
                'X-WP-Nonce': wpApiSettings.nonce,
            },
        })
        .then((response) => {
            if(response.data.error) {
                console.log(response.data.error)
            } else {
                this.props.update_task({...this.props.taskData, task_status: taskState})

                if(taskState == 'completed') {
                    this.props.complete_task(task_id);
                } else {
                    this.props.incomplete_task(task_id);
                }
            }
        })
        .catch((error) => {
            console.error('Error creating task:', error);
        });
    }

    editTask = ()=> {
        this.setState((prevState) => {
            return (
                {...prevState, isEditable: !prevState.isEditable}
            )
        })
    }

    editTaskItem = (e) => {
        const key = e.target.name
        const value = e.target.value;
        const prevData = this.findTask();
        let updatedTask = {
            ...prevData
        };
        updatedTask[key] = value;
        this.props.update_task(updatedTask);
      };

    findTask = () => {
        return this.props.task.filter(taskItem => {
            return taskItem.task_id === this.props.taskData.task_id;
        })[0];
    }
    

    saveTask = (e) => {
        let { task_id, task_title, task_content, task_priority, task_labels, task_due_date} = this.findTask();
        const requestBody = {
            task_id: task_id,
            task_title: task_title,
            task_content: task_content,
            task_priority: task_priority,
            task_labels: task_labels,
            task_due_date: task_due_date,
        }
        console.log(requestBody)
        axios.post(this.props.url + '/wp-json/checker/v1/chkr_task/update/', requestBody, {
            headers: {
                'X-WP-Nonce': wpApiSettings.nonce,
            }
        })
        .then((response) => {
            if (response.data.error) {
                console.log(response.data.error);
            } else {
               this.setState((prevState) => {
                return ({
                    ...prevState,
                    isEditable: false
                })
               })
            }
        })
        .catch((error) => {
            console.error('Error fetching tasks:', error);
        });
    }

    deleteTask = ()=> {
        const task_id = this.props.taskData.task_id;
        axios.delete(`${this.props.url}/wp-json/checker/v1/chkr_task/delete/${task_id}`, {
            headers: {
                'X-WP-Nonce': wpApiSettings.nonce,
            }
        })
        .then((response) => {
            if (response.data.error) {
                console.log(response.data.error);
            } else {
               this.props.rem_task(task_id)
               this.props.incomplete_task(task_id);
            }
        })
        .catch((error) => {
            console.error('Error fetching tasks:', error);
        });
    }

    showDesc = (e) => {
        this.setState((prevState) => {
            return (
                {
                    ...prevState,
                    accordion: !prevState.accordion
                }
            )
        })
    }

    render() {
        let { task_id, task_title, task_content, task_priority, task_labels, task_due_date, task_status, isSelected} = this.props.taskData;
        let isEditable = this.state.isEditable;
        let draggable = this.props.draggable;
        let class_name = '';
        if(this.state.isEditable || isSelected) {
            class_name = 'chkr-selected';
        } 
        const inputStyle = {
            display: 'inline-block',
            marginLeft: '37px',
          };

        return (
            <>
                <tr 
                    className={'chkr-task-item ' + class_name} data-task-id={task_id}
                    draggable={!draggable} // Make the <tr> elements draggable
                    onDragStart={(e) => this.props.handleDragStart(e, task_id)} // Handle the start of a drag operation
                    onDragOver={(e) => this.props.handleDragOver(e, task_id)} // Handle dragging over a target element
                    onDragEnd={this.props.handleDragEnd}
                    onClick={(e) => EventHandlers.handleOnClick(e, task_id)}>
                    <td><input
                    type="checkbox"
                    onChange={(e) => {this.updateStatus(e)}}
                    checked={task_status !== 'pending'}
                    /></td>
                    <td>
                        <input className={isEditable ? '' : 'chkr-input-fields'} onChange={this.editTaskItem} name="task_title" value={task_title}/>
                    </td>
                    <td>
                        {isEditable ? (
                            <select
                                className=""
                                onChange={this.editTaskItem}
                                name="task_priority"
                                value={task_priority}
                                style={inputStyle}
                            >
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                            </select>
                        ) : (
                            <input
                                className="chkr-input-fields"
                                disabled
                                onChange={this.editTaskItem}
                                name="task_priority"
                                value={task_priority}
                            />
                        )}
                    </td>

                    <td>
                        <input className={isEditable ? '' : 'chkr-input-fields'} onChange={this.editTaskItem} name="task_labels" value={task_labels}/>
                    </td>
                    <td>
                        <input className={isEditable ? 'chkr-hidden' : 'chkr-input-fields'} disabled onChange={this.editTaskItem} name="task_due_date" value={task_due_date}/>
                        <input className={isEditable ? '' : 'chkr-hidden'} type="date" name="task_due_date" onChange={this.editTaskItem} value={task_due_date} />
                    </td>
                    <ToolButton className='' name="accordion" icon="fas fa-caret-down" eventHandler={this.showDesc}/>
                    <ToolButton className='' name="Edit" icon="fas fa-edit" eventHandler={this.editTask} />
                    <ToolButton className={this.state.isEditable == true ? '' : 'chkr-hidden'} name="Update" icon="fas fa-save" eventHandler={(e) => {this.saveTask(e, task_id)}} />
                    <ToolButton className='' name="Delete" icon="fas fa-trash" eventHandler={this.deleteTask} />
                </tr>
                <tr className={this.state.accordion ? '' : 'chkr-hidden'}>
                    <td colSpan={5}>
                        <textarea value={task_content} onChange={this.editTaskItem} name="task_content" style={{height: '100px', width: '100%'}} className={isEditable ? '' : 'chkr-desc'}>{task_content}</textarea>
                    </td>
                </tr>
            </>
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
            incomplete_task: (id)=> {dispatch(incompleteTask(id))},
            complete_task: (id)=> {dispatch(completeTask(id))},
            update_task: (arr)=> {dispatch(updateTask(arr))},
            rem_task: (id)=> {dispatch(remTask(id))}
        }
    )
}

export default connect(mapStateToProps,mapDispatchToProps, null, {forwardRef: true} )(Task);