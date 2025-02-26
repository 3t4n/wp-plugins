import { Subject } from 'rxjs';
import {ActionType} from '../../generic';

export interface Update {
    Action: number;
}

export interface IdentifiedUpdate extends Update {
    Id: number;
}

// function activator<T>(type: { new(): T} ): T {
//     return new type();
// }

export class JoinTool {

    // Possibly Reducer function
    public static Merge<T extends U, U extends Update>(my: T, update: U): T {
        if (update.Action === ActionType.FullUpdate) {
            // TODO cleanup my
            JoinTool.MergePlainObject(my, update);
        }
        else if (update.Action === ActionType.Updated) {
            JoinTool.MergePlainObject(my, update);
        }
        else if (!update.Action){
            // TODO cleanup my
            Object.assign(my, update);
        }

        return my;
    }

    private static notify<T extends object>(my: T, x: PropertyKey){
        const myVal$ = Reflect.get(my, x.toString() + '$');
        if (myVal$ !== undefined) {
            // Notify about change
            (myVal$ as Subject<any>).next(Reflect.get(my, x));
        }
    }

    // Possibly Reducer function
    public static MergePlainObject<T extends object>(my: T, update: T) {
        if (my === undefined) {
            return;
        }

        Reflect.ownKeys(update)
            .filter(x => x !== 'Action' && x !== 'Id')
            .forEach(x => {
                const withVal = Reflect.get(update, x);
                const myVal = Reflect.get(my, x);
                if (withVal !== undefined) {
                    if (withVal instanceof Array) {
                        const withList = withVal as IdentifiedUpdate[];

                        if (withList.length === 0){
                            return;
                        }

                        if (withList[0] instanceof Object) {
                            const myList = myVal as IdentifiedUpdate[] || [];
                            const idmap: {[id: number]: IdentifiedUpdate} = {};
                            myList.forEach(element => {
                                idmap[element.Id] = element;
                            });

                            withList.forEach(element => {
                                const id = element.Id;
                                const oldItem = idmap[id];
                                switch (element.Action) {
                                    case ActionType.Deleted:
                                        delete idmap[id];
                                        break;
                                    case ActionType.FullUpdate:
                                        idmap[id] = element;
                                        break;
                                    case ActionType.Inserted:
                                    case ActionType.Updated:
                                        idmap[id] = (oldItem === undefined) ? element : JoinTool.Merge(oldItem, element);
                                        break;
                                }
                            });
                            Reflect.set(my, x, Object.values(idmap));
                        }
                        else {
                            // Just set array of simple values
                            Reflect.set(my, x, withVal);
                        }
                    } else if (withVal instanceof Object){
                        Reflect.set(my, x, myVal === undefined ? withVal : JoinTool.Merge(myVal, withVal));
                    }
                    else {
                        // Just set simple value
                        Reflect.set(my, x, withVal);
                    }
                    JoinTool.notify(my, x);
                }
            });
    }
}
