import {Subject} from 'rxjs';

export class EventBus {
    public readonly onError = new Subject<any>();
}
