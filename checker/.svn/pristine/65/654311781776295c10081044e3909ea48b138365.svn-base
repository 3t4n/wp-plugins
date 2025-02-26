import { combineReducers } from "redux";
import taskReducer from "./taskReducer";
import completeTaskReducer from "./completeTasksReducer";
import BulkOptionsReducer from "./bulkOptionsReducer";

// Create a function to initialize fullURL
function getFullURL() {
  const url = new URL(window.location.href);

  // Get the origin (protocol + hostname)
  const origin = url.origin;

  // Get the pathname (including "wordpress/")
  const pathname = url.pathname.split('/wp-admin/')[0];

  return origin + pathname;
}

// Define the initial state for the URLReducer
const initialURLState = getFullURL();

function URLReducer(state = initialURLState, action) {
  return state;
}

const rootReducer = combineReducers({
  task: taskReducer,
  completedTasks: completeTaskReducer,
  url: URLReducer,
  bulkOptions: BulkOptionsReducer,
});

export default rootReducer;
