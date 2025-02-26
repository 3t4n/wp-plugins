/* tslint:disable:no-unused-expression no-empty */
import {expect} from 'chai';
import {ActionType, MyExtensionInfo, Registration, Registrations} from '../../generic';
import { MyExtensionInfoEx } from '../my-extension-info-ex';
import { JoinTool } from './join';

describe(`JoinTool`, () => {
    let dest: MyExtensionInfo;
    let src: MyExtensionInfo;

    beforeEach(() => {
        dest = new MyExtensionInfo();
        src = new MyExtensionInfo({
            Action: ActionType.Updated,
            Number: '100',
            QueueStatus: true,
            ActiveDevices: new Registrations({
                Action: ActionType.Updated,
                Items: [
                    new Registration({
                        Id: 5,
                        Action: ActionType.FullUpdate,
                        Contact: 'Contact1',
                        UserAgent: 'MyAgent'
                    })
                ]
            })
        });
        JoinTool.Merge(dest, src);
    });

    it(`joins objects`, () => {
        expect(dest.Number).equal('100');
        expect(dest.QueueStatus).to.be.true;
        expect(dest.ActiveDevices.Items[0].Contact).equal('Contact1');
        expect(dest.ActiveDevices.Items[0].UserAgent).equal('MyAgent');

        const src1 = new MyExtensionInfo({
            Action: ActionType.Updated,
            ActiveDevices: new Registrations({
                Action: ActionType.Updated,
                Items: [
                    new Registration({
                        Id: 5,
                        Action: ActionType.Updated,
                        Contact: 'Contact2'
                    }),
                    new Registration({
                        Id: 6,
                        Action: ActionType.Updated,
                        Contact: 'Contact3'
                    })
                ]
            })
        });

        JoinTool.Merge(dest, src1);
        expect(dest.ActiveDevices.Items[0].Contact).equal('Contact2');
        expect(dest.ActiveDevices.Items[0].UserAgent).equal('MyAgent');
        expect(dest.ActiveDevices.Items[1].Contact).equal('Contact3');
    });

    it(`deletes objects`, () => {
        const src1 = new MyExtensionInfo({
            Action: ActionType.Updated,
            ActiveDevices: new Registrations({
                Action: ActionType.Updated,
                Items: [
                    new Registration({
                        Id: 5,
                        Action: ActionType.Deleted,
                    }),
                ]
            })
        });

        JoinTool.Merge(dest, src1);
        expect(dest.ActiveDevices.Items.length).equal(0);
    });

    it(`full update objects`, () => {
        const src1 = new MyExtensionInfo({
            Action: ActionType.Updated,
            ActiveDevices: new Registrations({
                Action: ActionType.Updated,
                Items: [
                    new Registration({
                        Id: 5,
                        Action: ActionType.FullUpdate,
                        Contact: 'Contact1'
                    }),
                ]
            })
        });

        JoinTool.Merge(dest, src1);
        expect(dest.ActiveDevices.Items[0].UserAgent).undefined;
        expect(dest.ActiveDevices.Items[0].Contact).equal('Contact1');
    });
});
