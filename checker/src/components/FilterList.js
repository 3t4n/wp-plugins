import React, { Component } from "react";
import Button from "./Button";
import axios from "axios";
import { connect} from 'react-redux';
import { addAllCompleteTasks, addAllTask, remTask, incompleteTask, updateTask } from '../state/actionCreators';

class FilterList extends Component {
  constructor(props) {
    super(props);
    this.state = {
      selectedFilters: {
        completed: false,
        pending: false,
        lowPriority: false,
        highPriority: false,
        mediumPriority: false,
      },
    };
  }

  handleFilterChange = (filterName) => {
    this.setState((prevState) => ({
      selectedFilters: {
        ...prevState.selectedFilters,
        [filterName]: !prevState.selectedFilters[filterName],
      },
    }));
  };


  applyFilters = () => {
    const { selectedFilters, startDate, endDate } = this.state;

    const requestBody = {
        filters: JSON.stringify(selectedFilters),
        
    };
  
    axios.post(this.props.url + '/wp-json/checker/v1/chkr_task/filteredtasks/', requestBody, {
            headers: {
            'Content-Type': 'application/json',
            'X-WP-Nonce': wpApiSettings.nonce,
        },
    })
    .then((response) => {
        if (response.data.error) {
            console.log(response.data.error);
        } else {
            this.props.add_all_tasks(response.data.filtered_tasks)
            this.props.add_all_complete_tasks(response.data.filtered_com_tasks)
        }
    })
    .catch((error) => {
            console.error('Error fetching filtered tasks:', error);
        });

        // Set filters applied state to true in checker manager.
        this.props.applyFilters();
    };

  render() {
    return (
      <div id="chkr-filter-wrapper" className={`${this.props.isFilterListOpen ? '' : 'chkr-hidden'}`}>
        <div id="chkr-filter-list" >
          <div id="chkr-status-filters">
            <p>Status</p>
            <Filter
              name="Completed"
              onChange={() => this.handleFilterChange("completed")}
              checked={this.state.selectedFilters.completed} 
            />
            <Filter
              name="Pending"
              onChange={() => this.handleFilterChange("pending")}
              checked={this.state.selectedFilters.pending} 
            />
          </div>
          <div id="chkr-priority-filters">
            <p>Priority</p>
            <Filter
              name="Low priority"
              onChange={() => this.handleFilterChange("lowPriority")}
              checked={this.state.selectedFilters.lowPriority} 
            />
            <Filter
              name="Medium priority"
              onChange={() => this.handleFilterChange("mediumPriority")}
              checked={this.state.selectedFilters.mediumPriority} 
            />
            <Filter
              name="High priority"
              onChange={() => this.handleFilterChange("highPriority")}
              checked={this.state.selectedFilters.highPriority} 
            />
            
          </div>
          {/* <div id="chkr-date-filters">
            <label htmlFor="start-date">Start Date:</label>
            <input
              type="date"
              id="start-date"
              value={this.state.startDate}
              onChange={this.handleStartDateChange}
            />
            <label htmlFor="end-date">End Date:</label>
            <input
              type="date"
              id="end-date"
              value={this.state.endDate}
              onChange={this.handleEndDateChange}
            />
          </div> */}
          
        </div>
        <Button name="Apply Filters" eventHandler={this.applyFilters} />
        <Button name="Remove Filters" eventHandler={this.props.removeFilters} />
      </div>
    );
  }
}

class Filter extends Component {
    
  render() {
    return (
      <span className="chkr-filter-item">
        <input
          type="checkbox"
          onChange={this.props.onChange}
          checked={this.props.checked}
        />
        <span>{this.props.name}</span>
      </span>
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
            rem_task: (id) => {dispatch(remTask(id))},
            rem_completed_tasks: (id) => {dispatch(incompleteTask(id))},
            add_all_tasks: (arr)=> {dispatch(addAllTask(arr))},
            add_all_complete_tasks: (arr)=> {dispatch(addAllCompleteTasks(arr))},
            update_task: (arr)=> {dispatch(updateTask(arr))},
        }
    )
}

export default connect(mapStateToProps,mapDispatchToProps )(FilterList);