"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.WidgetLib = void 0;
const SIGNATURE = 'alibi-tech-message';
const DEBUG = false;
class WidgetLib {
    static sendParent(payload) {
        if (window.parent) {
            DEBUG && console.log(`WidgetLib.sendParent`, payload);
            window.parent.postMessage(payload, '*');
        }
        else {
            DEBUG && console.log(`WidgetLib.sendParent skipped - no parent`, payload);
        }
    }
    static setSize(size) {
        WidgetLib.sendParent({ SIGNATURE, messageType: 'resize', newSize: size });
    }
    static widgetMessage(origin, event) {
        DEBUG &&
            console.log(`WidgetLib.isWidgetMessage `, {
                origin,
                event,
                s: event.data['SIGNATURE'],
                SIGNATURE,
            });
        return event.origin === origin && event.data['SIGNATURE'] === SIGNATURE ? event.data : undefined;
    }
}
exports.WidgetLib = WidgetLib;
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoid2lkZ2V0LWxpYi5qcyIsInNvdXJjZVJvb3QiOiIiLCJzb3VyY2VzIjpbIi4uLy4uL3NyYy93aWRnZXQtbGliLnRzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiI7OztBQUdBLE1BQU0sU0FBUyxHQUFHLG9CQUFvQixDQUFDO0FBUXZDLE1BQU0sS0FBSyxHQUFHLEtBQUssQ0FBQztBQUVwQixNQUFhLFNBQVM7SUFDWixNQUFNLENBQUMsVUFBVSxDQUFDLE9BQTZCO1FBQ3JELElBQUksTUFBTSxDQUFDLE1BQU0sRUFBRTtZQUNqQixLQUFLLElBQUksT0FBTyxDQUFDLEdBQUcsQ0FBQyxzQkFBc0IsRUFBRSxPQUFPLENBQUMsQ0FBQztZQUN0RCxNQUFNLENBQUMsTUFBTSxDQUFDLFdBQVcsQ0FBQyxPQUFPLEVBQUUsR0FBRyxDQUFDLENBQUM7U0FDekM7YUFBTTtZQUNMLEtBQUssSUFBSSxPQUFPLENBQUMsR0FBRyxDQUFDLDBDQUEwQyxFQUFFLE9BQU8sQ0FBQyxDQUFDO1NBQzNFO0lBQ0gsQ0FBQztJQUNNLE1BQU0sQ0FBQyxPQUFPLENBQUMsSUFBZ0I7UUFDcEMsU0FBUyxDQUFDLFVBQVUsQ0FBQyxFQUFFLFNBQVMsRUFBRSxXQUFXLEVBQUUsUUFBUSxFQUFFLE9BQU8sRUFBRSxJQUFJLEVBQUUsQ0FBQyxDQUFDO0lBQzVFLENBQUM7SUFFTSxNQUFNLENBQUMsYUFBYSxDQUFDLE1BQWMsRUFBRSxLQUFtQjtRQUM3RCxLQUFLO1lBQ0gsT0FBTyxDQUFDLEdBQUcsQ0FBQyw0QkFBNEIsRUFBRTtnQkFDeEMsTUFBTTtnQkFDTixLQUFLO2dCQUNMLENBQUMsRUFBRSxLQUFLLENBQUMsSUFBSSxDQUFDLFdBQVcsQ0FBQztnQkFDMUIsU0FBUzthQUNWLENBQUMsQ0FBQztRQUNMLE9BQU8sS0FBSyxDQUFDLE1BQU0sS0FBSyxNQUFNLElBQUksS0FBSyxDQUFDLElBQUksQ0FBQyxXQUFXLENBQUMsS0FBSyxTQUFTLENBQUMsQ0FBQyxDQUFDLEtBQUssQ0FBQyxJQUFJLENBQUMsQ0FBQyxDQUFDLFNBQVMsQ0FBQztJQUNuRyxDQUFDO0NBQ0Y7QUF2QkQsOEJBdUJDIn0=