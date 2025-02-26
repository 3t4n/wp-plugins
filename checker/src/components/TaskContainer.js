import React, { Component } from 'react';
import Task from './Task';
import store from '../state/store';
import { connect } from 'react-redux';
import { addAllTask} from '../state/actionCreators';
import axios from 'axios';

class TaskContainer extends Component {
constructor(props) {
    super();
    this.state = {
        draggedTaskId: null,
        sortedByTitle: false,
        sortedByDueDate: false
    };
}


sortByTitle = () => {
    let { sortedByTitle } = this.state;
    this.setState({sortedByDueDate : false})
    if(sortedByTitle){
        this.props.getAllTasks();
        this.setState({sortedByTitle : false})
    }
    else{
        let tasks = this.props.task;
        let sortedTasks = [...tasks]

        sortedTasks.sort((a, b) => a.task_title.localeCompare( b.task_title));
        
        this.props.add_all_tasks(sortedTasks);
        this.setState({sortedByTitle : true})
    }
    
};

sortByDueDate = () => {
    let { sortedByDueDate } = this.state;
    this.setState({sortedByTitle : false})
    if(sortedByDueDate){
        this.props.getAllTasks();
        this.setState({sortedByDueDate : false})
    }
    else{
        let tasks = this.props.task;
        let sortedTasks = [...tasks]

        sortedTasks.sort((a, b) => b.task_due_date.localeCompare( a.task_due_date));
        
        this.props.add_all_tasks(sortedTasks);
        this.setState({sortedByDueDate : true})
    }
    
};


// Function to handle the start of a drag operation
handleDragStart = (e, taskId) => {
    // Set the data to be transferred during the drag-and-drop operation
    e.dataTransfer.setData('text/html', taskId);

    // Set the currently dragged task's ID in the component's state
    this.setState({ draggedTaskId: taskId });
    
};

// Function to handle dragging over a target element
handleDragOver = (e, taskId) => {
    e.preventDefault();
  
    if (taskId !== this.state.draggedTaskId) {
      const tasks = this.props.task;
  
      const draggedTask = tasks.find((task) => task.task_id === this.state.draggedTaskId);
      const targetTask = tasks.find((task) => task.task_id === taskId);
  
      const updatedTasks = [...tasks];
      const draggedTaskIndex = updatedTasks.indexOf(draggedTask);
      const targetTaskIndex = updatedTasks.indexOf(targetTask);
  
      updatedTasks.splice(draggedTaskIndex, 1);
      updatedTasks.splice(targetTaskIndex, 0, draggedTask);
  
      this.props.add_all_tasks(updatedTasks);
    }
  };
  

handleDragEnd = () => {
    const tasks = this.props.task;
    const taskIds = tasks.map((task) => task.task_id);
    console.log(taskIds)
  
    const requestBody = {
        task_order: JSON.stringify(taskIds),
    };

    axios.post(`${store.getState().url}/wp-json/checker/v1/chkr_task/taskOrder/`, requestBody, {
        headers: {
            'X-WP-Nonce': wpApiSettings.nonce,
        }
    })
    .then((response) => {

        if (response.data.error) {
            console.log(response.data.error);
        } else {
            console.log('Updated task order');
    }
        
    })
    .catch((error) => {
        console.error('Error updating task:', error);
    });
}

render() {
    const allTasks = this.props.task;

    return (
    <>
        <table>
            <thead>
                <tr>
                    <th>Mark Complete</th>
                    <th 
                        className={`chkr-header-title ${this.state.sortedByTitle ? 'chkr-clicked' : ''}`}
                        onClick = {this.sortByTitle}>
                        Name <i className="fa fa-caret-down"></i>
                    </th>
                    <th>Priority</th>
                    <th>Labels</th>
                    <th 
                        className={`chkr-header-duedate ${this.state.sortedByDueDate ? 'chkr-clicked' : ''}`}
                        onClick = {this.sortByDueDate}>
                        Due Date <i className="fa fa-caret-down"></i>
                    </th>
                </tr>
                <tr>
                    <th colSpan={5}><hr /></th>
                </tr>
            </thead>
            <tbody>

            { 
                allTasks.map((taskData, index) => {
                    return <Task  
                            key = {index}
                            taskData = {taskData}
                            draggable = {this.state.sortedByDueDate || this.state.sortedByTitle || this.props.isFiltersApplied}
                            handleDragStart = {this.handleDragStart}
                            handleDragOver = {this.handleDragOver}
                            handleDragEnd = {this.handleDragEnd}
                        />
                })
                
            }
        </tbody>
        </table>
    </>
    );
}
}

const mapStateToProps = (state) => {
    return (
        {
            task: state.task
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

export default connect(mapStateToProps,mapDispatchToProps)(TaskContainer);
