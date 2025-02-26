/*eslint-disable block-scoped-var, id-length, no-control-regex, no-magic-numbers, no-prototype-builtins, no-redeclare, no-shadow, no-var, sort-vars*/
import * as $protobuf from "protobufjs/minimal";

// Common aliases
const $Reader = $protobuf.Reader, $Writer = $protobuf.Writer, $util = $protobuf.util;

// Exported root namespace
const $root = $protobuf.roots["default"] || ($protobuf.roots["default"] = {});

/**
 * ErrorCodes enum.
 * @exports ErrorCodes
 * @enum {string}
 * @property {number} ConferenceWithPinDoesNotExist=-1 ConferenceWithPinDoesNotExist value
 * @property {number} ConferenceWithPinAlreadyExists=-2 ConferenceWithPinAlreadyExists value
 * @property {number} ConferencePinAndIdDoesNotMatch=-3 ConferencePinAndIdDoesNotMatch value
 * @property {number} ConferenceAccessDenied=-4 ConferenceAccessDenied value
 * @property {number} ConferenceIsCancelled=-5 ConferenceIsCancelled value
 * @property {number} ConferencePinIsReadOnly=-6 ConferencePinIsReadOnly value
 * @property {number} ConferenceInvalidPin=-7 ConferenceInvalidPin value
 * @property {number} CannotGeneratePin=-8 CannotGeneratePin value
 * @property {number} FwdProfileDoesNotExist=-9 FwdProfileDoesNotExist value
 * @property {number} FwdProfileOverrideExpirationRequired=-10 FwdProfileOverrideExpirationRequired value
 * @property {number} Success=0 Success value
 * @property {number} NoSuchRequest=1 NoSuchRequest value
 * @property {number} ExceptionOccured=2 ExceptionOccured value
 * @property {number} RequestIsNotSupported=3 RequestIsNotSupported value
 * @property {number} ServerIsBusy=4 ServerIsBusy value
 * @property {number} BridgeNotFound=5 BridgeNotFound value
 * @property {number} CannotCleanOwnExtension=6 CannotCleanOwnExtension value
 * @property {number} SetWakeupCallResult=7 SetWakeupCallResult value
 * @property {number} ExtensionNotFound=8 ExtensionNotFound value
 * @property {number} NoPermission=9 NoPermission value
 * @property {number} WebMeetingNoEmail=12 WebMeetingNoEmail value
 * @property {number} WebMeetingNoAccess=13 WebMeetingNoAccess value
 * @property {number} WebMeetingInvalidOrganizer=16 WebMeetingInvalidOrganizer value
 * @property {number} WebMeetingInvalidParameters=17 WebMeetingInvalidParameters value
 * @property {number} WebMeetingInvalidParticipant=18 WebMeetingInvalidParticipant value
 * @property {number} WebMeetingInvalidPin=19 WebMeetingInvalidPin value
 * @property {number} WebMeetingAccessDenied=20 WebMeetingAccessDenied value
 * @property {number} WebMeetingNotFound=21 WebMeetingNotFound value
 * @property {number} WebMeetingCannotDeleteQM=22 WebMeetingCannotDeleteQM value
 * @property {number} WebMeetingPinIsReadonly=23 WebMeetingPinIsReadonly value
 * @property {number} WebMeetingNumberToCallIsReadonly=24 WebMeetingNumberToCallIsReadonly value
 * @property {number} WebMeetingInvalidWmUser=25 WebMeetingInvalidWmUser value
 * @property {number} ExtensionEmailRequired=30 ExtensionEmailRequired value
 * @property {number} QueueNumberRequired=31 QueueNumberRequired value
 * @property {number} ChatIsDisabled=32 ChatIsDisabled value
 * @property {number} PersonalContactRequired=33 PersonalContactRequired value
 * @property {number} RequiredFieldIsEmpty=34 RequiredFieldIsEmpty value
 * @property {number} ContactNotFound=35 ContactNotFound value
 * @property {number} ContactIsReadonly=36 ContactIsReadonly value
 * @property {number} ActionIsNotAllowed=37 ActionIsNotAllowed value
 * @property {number} FileNotFound=38 FileNotFound value
 * @property {number} OwnRecordingsDenied=39 OwnRecordingsDenied value
 * @property {number} InvalidValue=40 InvalidValue value
 * @property {number} InvalidMedia=41 InvalidMedia value
 * @property {number} InvalidOperation=42 InvalidOperation value
 * @property {number} OperationFailed=43 OperationFailed value
 */
export const ErrorCodes = $root.ErrorCodes = (() => {
    const valuesById = {}, values = Object.create(valuesById);
    values[valuesById[-1] = "ConferenceWithPinDoesNotExist"] = -1;
    values[valuesById[-2] = "ConferenceWithPinAlreadyExists"] = -2;
    values[valuesById[-3] = "ConferencePinAndIdDoesNotMatch"] = -3;
    values[valuesById[-4] = "ConferenceAccessDenied"] = -4;
    values[valuesById[-5] = "ConferenceIsCancelled"] = -5;
    values[valuesById[-6] = "ConferencePinIsReadOnly"] = -6;
    values[valuesById[-7] = "ConferenceInvalidPin"] = -7;
    values[valuesById[-8] = "CannotGeneratePin"] = -8;
    values[valuesById[-9] = "FwdProfileDoesNotExist"] = -9;
    values[valuesById[-10] = "FwdProfileOverrideExpirationRequired"] = -10;
    values[valuesById[0] = "Success"] = 0;
    values[valuesById[1] = "NoSuchRequest"] = 1;
    values[valuesById[2] = "ExceptionOccured"] = 2;
    values[valuesById[3] = "RequestIsNotSupported"] = 3;
    values[valuesById[4] = "ServerIsBusy"] = 4;
    values[valuesById[5] = "BridgeNotFound"] = 5;
    values[valuesById[6] = "CannotCleanOwnExtension"] = 6;
    values[valuesById[7] = "SetWakeupCallResult"] = 7;
    values[valuesById[8] = "ExtensionNotFound"] = 8;
    values[valuesById[9] = "NoPermission"] = 9;
    values[valuesById[12] = "WebMeetingNoEmail"] = 12;
    values[valuesById[13] = "WebMeetingNoAccess"] = 13;
    values[valuesById[16] = "WebMeetingInvalidOrganizer"] = 16;
    values[valuesById[17] = "WebMeetingInvalidParameters"] = 17;
    values[valuesById[18] = "WebMeetingInvalidParticipant"] = 18;
    values[valuesById[19] = "WebMeetingInvalidPin"] = 19;
    values[valuesById[20] = "WebMeetingAccessDenied"] = 20;
    values[valuesById[21] = "WebMeetingNotFound"] = 21;
    values[valuesById[22] = "WebMeetingCannotDeleteQM"] = 22;
    values[valuesById[23] = "WebMeetingPinIsReadonly"] = 23;
    values[valuesById[24] = "WebMeetingNumberToCallIsReadonly"] = 24;
    values[valuesById[25] = "WebMeetingInvalidWmUser"] = 25;
    values[valuesById[30] = "ExtensionEmailRequired"] = 30;
    values[valuesById[31] = "QueueNumberRequired"] = 31;
    values[valuesById[32] = "ChatIsDisabled"] = 32;
    values[valuesById[33] = "PersonalContactRequired"] = 33;
    values[valuesById[34] = "RequiredFieldIsEmpty"] = 34;
    values[valuesById[35] = "ContactNotFound"] = 35;
    values[valuesById[36] = "ContactIsReadonly"] = 36;
    values[valuesById[37] = "ActionIsNotAllowed"] = 37;
    values[valuesById[38] = "FileNotFound"] = 38;
    values[valuesById[39] = "OwnRecordingsDenied"] = 39;
    values[valuesById[40] = "InvalidValue"] = 40;
    values[valuesById[41] = "InvalidMedia"] = 41;
    values[valuesById[42] = "InvalidOperation"] = 42;
    values[valuesById[43] = "OperationFailed"] = 43;
    return values;
})();

/**
 * ActionType enum.
 * @exports ActionType
 * @enum {string}
 * @property {number} NoUpdates=0 NoUpdates value
 * @property {number} FullUpdate=1 FullUpdate value
 * @property {number} Inserted=2 Inserted value
 * @property {number} Updated=3 Updated value
 * @property {number} Deleted=4 Deleted value
 */
export const ActionType = $root.ActionType = (() => {
    const valuesById = {}, values = Object.create(valuesById);
    values[valuesById[0] = "NoUpdates"] = 0;
    values[valuesById[1] = "FullUpdate"] = 1;
    values[valuesById[2] = "Inserted"] = 2;
    values[valuesById[3] = "Updated"] = 3;
    values[valuesById[4] = "Deleted"] = 4;
    return values;
})();

/**
 * ChatFileState enum.
 * @exports ChatFileState
 * @enum {string}
 * @property {number} CF_Uploading=0 CF_Uploading value
 * @property {number} CF_Available=1 CF_Available value
 * @property {number} CF_Deleted=2 CF_Deleted value
 */
export const ChatFileState = $root.ChatFileState = (() => {
    const valuesById = {}, values = Object.create(valuesById);
    values[valuesById[0] = "CF_Uploading"] = 0;
    values[valuesById[1] = "CF_Available"] = 1;
    values[valuesById[2] = "CF_Deleted"] = 2;
    return values;
})();

export const Login = $root.Login = (() => {

    /**
     * Properties of a Login.
     * @exports ILogin
     * @property {string} User Login User
     * @property {string} [Password] Login Password
     * @property {string} [ClientVersion] Login ClientVersion
     * @property {string} [ClientInfo] Login ClientInfo
     * @property {string} [ProtocolVersion] Login ProtocolVersion
     */

    /**
     * Constructs a new Login.
     * @exports Login
     * @classdesc Represents a Login.
     * @constructor
     * @param {Partial<Login>} [properties] Properties to set
     */
    function Login(properties) {
        if (properties)
            for (let keys = Object.keys(properties), i = 0; i < keys.length; ++i)
                if (properties[keys[i]] != null)
                    this[keys[i]] = properties[keys[i]];
    }

    /**
     * Login User.
     * @member {string} User
     * @memberof Login
     * @instance
     */

    /**
     * Login Password.
     * @member {string} Password
     * @memberof Login
     * @instance
     */

    /**
     * Login ClientVersion.
     * @member {string} ClientVersion
     * @memberof Login
     * @instance
     */

    /**
     * Login ClientInfo.
     * @member {string} ClientInfo
     * @memberof Login
     * @instance
     */

    /**
     * Login ProtocolVersion.
     * @member {string} ProtocolVersion
     * @memberof Login
     * @instance
     */

    /**
     * Encodes the specified Login message. Does not implicitly {@link Login.verify|verify} messages.
     * @function encode
     * @memberof Login
     * @static
     * @param {Login} message Login message or plain object to encode
     * @param {$protobuf.Writer} [writer] Writer to encode to
     * @returns {$protobuf.Writer} Writer
     */
    Login.encode = function encode(message, writer) {
        if (!writer)
            writer = $Writer.create();
        writer.uint32(/* id 1, wireType 2 =*/10).string(message.User);
        if (message.Password != null && message.hasOwnProperty("Password"))
            writer.uint32(/* id 2, wireType 2 =*/18).string(message.Password);
        if (message.ClientVersion != null && message.hasOwnProperty("ClientVersion"))
            writer.uint32(/* id 3, wireType 2 =*/26).string(message.ClientVersion);
        if (message.ClientInfo != null && message.hasOwnProperty("ClientInfo"))
            writer.uint32(/* id 4, wireType 2 =*/34).string(message.ClientInfo);
        if (message.ProtocolVersion != null && message.hasOwnProperty("ProtocolVersion"))
            writer.uint32(/* id 5, wireType 2 =*/42).string(message.ProtocolVersion);
        return writer;
    };

    /**
     * Decodes a Login message from the specified reader or buffer.
     * @function decode
     * @memberof Login
     * @static
     * @param {$protobuf.Reader|Uint8Array} reader Reader or buffer to decode from
     * @param {number} [length] Message length if known beforehand
     * @returns {Login} Login
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    Login.decode = function decode(reader, length) {
        if (!(reader instanceof $Reader))
            reader = $Reader.create(reader);
        let end = length === undefined ? reader.len : reader.pos + length, message = new $root.Login();
        while (reader.pos < end) {
            let tag = reader.uint32();
            switch (tag >>> 3) {
            case 1:
                message.User = reader.string();
                break;
            case 2:
                message.Password = reader.string();
                break;
            case 3:
                message.ClientVersion = reader.string();
                break;
            case 4:
                message.ClientInfo = reader.string();
                break;
            case 5:
                message.ProtocolVersion = reader.string();
                break;
            default:
                reader.skipType(tag & 7);
                break;
            }
        }
        return message;
    };

    /**
     * Converts a Login message to GenericMessage
     * @function toGenericMessage
     * @memberof Login
     * @instance
     * @returns {GenericMessage} GenericMessage
     */
    Login.prototype.toGenericMessage = function toGenericMessage() {
        return new $root.GenericMessage({MessageId: 100, LoginRequest : this});
    };

    return Login;
})();

export const LoginInfo = $root.LoginInfo = (() => {

    /**
     * Properties of a LoginInfo.
     * @exports ILoginInfo
     * @property {number} [ExtensionId] LoginInfo ExtensionId
     * @property {boolean} [IsAuthenticated] LoginInfo IsAuthenticated
     * @property {string} [ValidationMessage] LoginInfo ValidationMessage
     * @property {string} [Nonce] LoginInfo Nonce
     * @property {string} [SessionId] LoginInfo SessionId
     * @property {number} [AddpTimeout] LoginInfo AddpTimeout
     * @property {string} [ServerVersion] LoginInfo ServerVersion
     * @property {boolean} [UpdateAvailable] LoginInfo UpdateAvailable
     * @property {number} [LicenseType] LoginInfo LicenseType
     * @property {string} [LicenseProduct] LoginInfo LicenseProduct
     * @property {string} [PbxVersion] LoginInfo PbxVersion
     */

    /**
     * Constructs a new LoginInfo.
     * @exports LoginInfo
     * @classdesc Represents a LoginInfo.
     * @constructor
     * @param {Partial<LoginInfo>} [properties] Properties to set
     */
    function LoginInfo(properties) {
        if (properties)
            for (let keys = Object.keys(properties), i = 0; i < keys.length; ++i)
                if (properties[keys[i]] != null)
                    this[keys[i]] = properties[keys[i]];
    }

    /**
     * LoginInfo ExtensionId.
     * @member {number} ExtensionId
     * @memberof LoginInfo
     * @instance
     */

    /**
     * LoginInfo IsAuthenticated.
     * @member {boolean} IsAuthenticated
     * @memberof LoginInfo
     * @instance
     */

    /**
     * LoginInfo ValidationMessage.
     * @member {string} ValidationMessage
     * @memberof LoginInfo
     * @instance
     */

    /**
     * LoginInfo Nonce.
     * @member {string} Nonce
     * @memberof LoginInfo
     * @instance
     */

    /**
     * LoginInfo SessionId.
     * @member {string} SessionId
     * @memberof LoginInfo
     * @instance
     */

    /**
     * LoginInfo AddpTimeout.
     * @member {number} AddpTimeout
     * @memberof LoginInfo
     * @instance
     */

    /**
     * LoginInfo ServerVersion.
     * @member {string} ServerVersion
     * @memberof LoginInfo
     * @instance
     */

    /**
     * LoginInfo UpdateAvailable.
     * @member {boolean} UpdateAvailable
     * @memberof LoginInfo
     * @instance
     */

    /**
     * LoginInfo LicenseType.
     * @member {number} LicenseType
     * @memberof LoginInfo
     * @instance
     */

    /**
     * LoginInfo LicenseProduct.
     * @member {string} LicenseProduct
     * @memberof LoginInfo
     * @instance
     */

    /**
     * LoginInfo PbxVersion.
     * @member {string} PbxVersion
     * @memberof LoginInfo
     * @instance
     */

    /**
     * Encodes the specified LoginInfo message. Does not implicitly {@link LoginInfo.verify|verify} messages.
     * @function encode
     * @memberof LoginInfo
     * @static
     * @param {LoginInfo} message LoginInfo message or plain object to encode
     * @param {$protobuf.Writer} [writer] Writer to encode to
     * @returns {$protobuf.Writer} Writer
     */
    LoginInfo.encode = function encode(message, writer) {
        if (!writer)
            writer = $Writer.create();
        if (message.ExtensionId != null && message.hasOwnProperty("ExtensionId"))
            writer.uint32(/* id 1, wireType 0 =*/8).int32(message.ExtensionId);
        if (message.IsAuthenticated != null && message.hasOwnProperty("IsAuthenticated"))
            writer.uint32(/* id 2, wireType 0 =*/16).bool(message.IsAuthenticated);
        if (message.ValidationMessage != null && message.hasOwnProperty("ValidationMessage"))
            writer.uint32(/* id 3, wireType 2 =*/26).string(message.ValidationMessage);
        if (message.Nonce != null && message.hasOwnProperty("Nonce"))
            writer.uint32(/* id 4, wireType 2 =*/34).string(message.Nonce);
        if (message.SessionId != null && message.hasOwnProperty("SessionId"))
            writer.uint32(/* id 5, wireType 2 =*/42).string(message.SessionId);
        if (message.AddpTimeout != null && message.hasOwnProperty("AddpTimeout"))
            writer.uint32(/* id 6, wireType 0 =*/48).int32(message.AddpTimeout);
        if (message.ServerVersion != null && message.hasOwnProperty("ServerVersion"))
            writer.uint32(/* id 7, wireType 2 =*/58).string(message.ServerVersion);
        if (message.UpdateAvailable != null && message.hasOwnProperty("UpdateAvailable"))
            writer.uint32(/* id 8, wireType 0 =*/64).bool(message.UpdateAvailable);
        if (message.LicenseType != null && message.hasOwnProperty("LicenseType"))
            writer.uint32(/* id 9, wireType 0 =*/72).int32(message.LicenseType);
        if (message.LicenseProduct != null && message.hasOwnProperty("LicenseProduct"))
            writer.uint32(/* id 10, wireType 2 =*/82).string(message.LicenseProduct);
        if (message.PbxVersion != null && message.hasOwnProperty("PbxVersion"))
            writer.uint32(/* id 11, wireType 2 =*/90).string(message.PbxVersion);
        return writer;
    };

    /**
     * Decodes a LoginInfo message from the specified reader or buffer.
     * @function decode
     * @memberof LoginInfo
     * @static
     * @param {$protobuf.Reader|Uint8Array} reader Reader or buffer to decode from
     * @param {number} [length] Message length if known beforehand
     * @returns {LoginInfo} LoginInfo
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    LoginInfo.decode = function decode(reader, length) {
        if (!(reader instanceof $Reader))
            reader = $Reader.create(reader);
        let end = length === undefined ? reader.len : reader.pos + length, message = new $root.LoginInfo();
        while (reader.pos < end) {
            let tag = reader.uint32();
            switch (tag >>> 3) {
            case 1:
                message.ExtensionId = reader.int32();
                break;
            case 2:
                message.IsAuthenticated = reader.bool();
                break;
            case 3:
                message.ValidationMessage = reader.string();
                break;
            case 4:
                message.Nonce = reader.string();
                break;
            case 5:
                message.SessionId = reader.string();
                break;
            case 6:
                message.AddpTimeout = reader.int32();
                break;
            case 7:
                message.ServerVersion = reader.string();
                break;
            case 8:
                message.UpdateAvailable = reader.bool();
                break;
            case 9:
                message.LicenseType = reader.int32();
                break;
            case 10:
                message.LicenseProduct = reader.string();
                break;
            case 11:
                message.PbxVersion = reader.string();
                break;
            default:
                reader.skipType(tag & 7);
                break;
            }
        }
        return message;
    };

    /**
     * Converts a LoginInfo message to GenericMessage
     * @function toGenericMessage
     * @memberof LoginInfo
     * @instance
     * @returns {GenericMessage} GenericMessage
     */
    LoginInfo.prototype.toGenericMessage = function toGenericMessage() {
        return new $root.GenericMessage({MessageId: 200, LoginResponse : this});
    };

    return LoginInfo;
})();

export const DateTime = $root.DateTime = (() => {

    /**
     * Properties of a DateTime.
     * @exports IDateTime
     * @property {number} [Year] DateTime Year
     * @property {number} [Month] DateTime Month
     * @property {number} [Day] DateTime Day
     * @property {number} [Hour] DateTime Hour
     * @property {number} [Minute] DateTime Minute
     * @property {number} [Second] DateTime Second
     */

    /**
     * Constructs a new DateTime.
     * @exports DateTime
     * @classdesc Represents a DateTime.
     * @constructor
     * @param {Partial<DateTime>} [properties] Properties to set
     */
    function DateTime(properties) {
        if (properties)
            for (let keys = Object.keys(properties), i = 0; i < keys.length; ++i)
                if (properties[keys[i]] != null)
                    this[keys[i]] = properties[keys[i]];
    }

    /**
     * DateTime Year.
     * @member {number} Year
     * @memberof DateTime
     * @instance
     */

    /**
     * DateTime Month.
     * @member {number} Month
     * @memberof DateTime
     * @instance
     */

    /**
     * DateTime Day.
     * @member {number} Day
     * @memberof DateTime
     * @instance
     */

    /**
     * DateTime Hour.
     * @member {number} Hour
     * @memberof DateTime
     * @instance
     */

    /**
     * DateTime Minute.
     * @member {number} Minute
     * @memberof DateTime
     * @instance
     */

    /**
     * DateTime Second.
     * @member {number} Second
     * @memberof DateTime
     * @instance
     */

    /**
     * Encodes the specified DateTime message. Does not implicitly {@link DateTime.verify|verify} messages.
     * @function encode
     * @memberof DateTime
     * @static
     * @param {DateTime} message DateTime message or plain object to encode
     * @param {$protobuf.Writer} [writer] Writer to encode to
     * @returns {$protobuf.Writer} Writer
     */
    DateTime.encode = function encode(message, writer) {
        if (!writer)
            writer = $Writer.create();
        if (message.Year != null && message.hasOwnProperty("Year"))
            writer.uint32(/* id 1, wireType 0 =*/8).int32(message.Year);
        if (message.Month != null && message.hasOwnProperty("Month"))
            writer.uint32(/* id 2, wireType 0 =*/16).int32(message.Month);
        if (message.Day != null && message.hasOwnProperty("Day"))
            writer.uint32(/* id 3, wireType 0 =*/24).int32(message.Day);
        if (message.Hour != null && message.hasOwnProperty("Hour"))
            writer.uint32(/* id 4, wireType 0 =*/32).int32(message.Hour);
        if (message.Minute != null && message.hasOwnProperty("Minute"))
            writer.uint32(/* id 5, wireType 0 =*/40).int32(message.Minute);
        if (message.Second != null && message.hasOwnProperty("Second"))
            writer.uint32(/* id 6, wireType 0 =*/48).int32(message.Second);
        return writer;
    };

    /**
     * Decodes a DateTime message from the specified reader or buffer.
     * @function decode
     * @memberof DateTime
     * @static
     * @param {$protobuf.Reader|Uint8Array} reader Reader or buffer to decode from
     * @param {number} [length] Message length if known beforehand
     * @returns {DateTime} DateTime
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    DateTime.decode = function decode(reader, length) {
        if (!(reader instanceof $Reader))
            reader = $Reader.create(reader);
        let end = length === undefined ? reader.len : reader.pos + length, message = new $root.DateTime();
        while (reader.pos < end) {
            let tag = reader.uint32();
            switch (tag >>> 3) {
            case 1:
                message.Year = reader.int32();
                break;
            case 2:
                message.Month = reader.int32();
                break;
            case 3:
                message.Day = reader.int32();
                break;
            case 4:
                message.Hour = reader.int32();
                break;
            case 5:
                message.Minute = reader.int32();
                break;
            case 6:
                message.Second = reader.int32();
                break;
            default:
                reader.skipType(tag & 7);
                break;
            }
        }
        return message;
    };

    return DateTime;
})();

export const Registration = $root.Registration = (() => {

    /**
     * Properties of a Registration.
     * @exports IRegistration
     * @property {ActionType} Action Registration Action
     * @property {number} Id Registration Id
     * @property {string} [Contact] Registration Contact
     * @property {string} [SourceAddress] Registration SourceAddress
     * @property {string} [UserAgent] Registration UserAgent
     * @property {DateTime} [ExpiresAt] Registration ExpiresAt
     */

    /**
     * Constructs a new Registration.
     * @exports Registration
     * @classdesc Represents a Registration.
     * @constructor
     * @param {Partial<Registration>} [properties] Properties to set
     */
    function Registration(properties) {
        if (properties)
            for (let keys = Object.keys(properties), i = 0; i < keys.length; ++i)
                if (properties[keys[i]] != null)
                    this[keys[i]] = properties[keys[i]];
    }

    /**
     * Registration Action.
     * @member {ActionType} Action
     * @memberof Registration
     * @instance
     */

    /**
     * Registration Id.
     * @member {number} Id
     * @memberof Registration
     * @instance
     */

    /**
     * Registration Contact.
     * @member {string} Contact
     * @memberof Registration
     * @instance
     */

    /**
     * Registration SourceAddress.
     * @member {string} SourceAddress
     * @memberof Registration
     * @instance
     */

    /**
     * Registration UserAgent.
     * @member {string} UserAgent
     * @memberof Registration
     * @instance
     */

    /**
     * Registration ExpiresAt.
     * @member {DateTime} ExpiresAt
     * @memberof Registration
     * @instance
     */

    /**
     * Encodes the specified Registration message. Does not implicitly {@link Registration.verify|verify} messages.
     * @function encode
     * @memberof Registration
     * @static
     * @param {Registration} message Registration message or plain object to encode
     * @param {$protobuf.Writer} [writer] Writer to encode to
     * @returns {$protobuf.Writer} Writer
     */
    Registration.encode = function encode(message, writer) {
        if (!writer)
            writer = $Writer.create();
        writer.uint32(/* id 1, wireType 0 =*/8).int32(message.Action);
        writer.uint32(/* id 2, wireType 0 =*/16).int32(message.Id);
        if (message.Contact != null && message.hasOwnProperty("Contact"))
            writer.uint32(/* id 3, wireType 2 =*/26).string(message.Contact);
        if (message.SourceAddress != null && message.hasOwnProperty("SourceAddress"))
            writer.uint32(/* id 4, wireType 2 =*/34).string(message.SourceAddress);
        if (message.UserAgent != null && message.hasOwnProperty("UserAgent"))
            writer.uint32(/* id 5, wireType 2 =*/42).string(message.UserAgent);
        if (message.ExpiresAt != null && message.hasOwnProperty("ExpiresAt"))
            $root.DateTime.encode(message.ExpiresAt, writer.uint32(/* id 6, wireType 2 =*/50).fork()).ldelim();
        return writer;
    };

    /**
     * Decodes a Registration message from the specified reader or buffer.
     * @function decode
     * @memberof Registration
     * @static
     * @param {$protobuf.Reader|Uint8Array} reader Reader or buffer to decode from
     * @param {number} [length] Message length if known beforehand
     * @returns {Registration} Registration
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    Registration.decode = function decode(reader, length) {
        if (!(reader instanceof $Reader))
            reader = $Reader.create(reader);
        let end = length === undefined ? reader.len : reader.pos + length, message = new $root.Registration();
        while (reader.pos < end) {
            let tag = reader.uint32();
            switch (tag >>> 3) {
            case 1:
                message.Action = reader.int32();
                break;
            case 2:
                message.Id = reader.int32();
                break;
            case 3:
                message.Contact = reader.string();
                break;
            case 4:
                message.SourceAddress = reader.string();
                break;
            case 5:
                message.UserAgent = reader.string();
                break;
            case 6:
                message.ExpiresAt = $root.DateTime.decode(reader, reader.uint32());
                break;
            default:
                reader.skipType(tag & 7);
                break;
            }
        }
        return message;
    };

    return Registration;
})();

export const Registrations = $root.Registrations = (() => {

    /**
     * Properties of a Registrations.
     * @exports IRegistrations
     * @property {ActionType} Action Registrations Action
     * @property {Array.<Registration>} [Items] Registrations Items
     */

    /**
     * Constructs a new Registrations.
     * @exports Registrations
     * @classdesc Represents a Registrations.
     * @constructor
     * @param {Partial<Registrations>} [properties] Properties to set
     */
    function Registrations(properties) {
        this.Items = [];
        if (properties)
            for (let keys = Object.keys(properties), i = 0; i < keys.length; ++i)
                if (properties[keys[i]] != null)
                    this[keys[i]] = properties[keys[i]];
    }

    /**
     * Registrations Action.
     * @member {ActionType} Action
     * @memberof Registrations
     * @instance
     */

    /**
     * Registrations Items.
     * @member {Array.<Registration>} Items
     * @memberof Registrations
     * @instance
     */
    Registrations.prototype.Items = $util.emptyArray;

    /**
     * Encodes the specified Registrations message. Does not implicitly {@link Registrations.verify|verify} messages.
     * @function encode
     * @memberof Registrations
     * @static
     * @param {Registrations} message Registrations message or plain object to encode
     * @param {$protobuf.Writer} [writer] Writer to encode to
     * @returns {$protobuf.Writer} Writer
     */
    Registrations.encode = function encode(message, writer) {
        if (!writer)
            writer = $Writer.create();
        writer.uint32(/* id 1, wireType 0 =*/8).int32(message.Action);
        if (message.Items != null && message.Items.length)
            for (let i = 0; i < message.Items.length; ++i)
                $root.Registration.encode(message.Items[i], writer.uint32(/* id 2, wireType 2 =*/18).fork()).ldelim();
        return writer;
    };

    /**
     * Decodes a Registrations message from the specified reader or buffer.
     * @function decode
     * @memberof Registrations
     * @static
     * @param {$protobuf.Reader|Uint8Array} reader Reader or buffer to decode from
     * @param {number} [length] Message length if known beforehand
     * @returns {Registrations} Registrations
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    Registrations.decode = function decode(reader, length) {
        if (!(reader instanceof $Reader))
            reader = $Reader.create(reader);
        let end = length === undefined ? reader.len : reader.pos + length, message = new $root.Registrations();
        while (reader.pos < end) {
            let tag = reader.uint32();
            switch (tag >>> 3) {
            case 1:
                message.Action = reader.int32();
                break;
            case 2:
                if (!(message.Items && message.Items.length))
                    message.Items = [];
                message.Items.push($root.Registration.decode(reader, reader.uint32()));
                break;
            default:
                reader.skipType(tag & 7);
                break;
            }
        }
        return message;
    };

    return Registrations;
})();

export const MyExtensionInfo = $root.MyExtensionInfo = (() => {

    /**
     * Properties of a MyExtensionInfo.
     * @exports IMyExtensionInfo
     * @property {ActionType} Action MyExtensionInfo Action
     * @property {number} Id MyExtensionInfo Id
     * @property {string} [Number] MyExtensionInfo Number
     * @property {boolean} [QueueStatus] MyExtensionInfo QueueStatus
     * @property {Registrations} [ActiveDevices] MyExtensionInfo ActiveDevices
     */

    /**
     * Constructs a new MyExtensionInfo.
     * @exports MyExtensionInfo
     * @classdesc Represents a MyExtensionInfo.
     * @constructor
     * @param {Partial<MyExtensionInfo>} [properties] Properties to set
     */
    function MyExtensionInfo(properties) {
        if (properties)
            for (let keys = Object.keys(properties), i = 0; i < keys.length; ++i)
                if (properties[keys[i]] != null)
                    this[keys[i]] = properties[keys[i]];
    }

    /**
     * MyExtensionInfo Action.
     * @member {ActionType} Action
     * @memberof MyExtensionInfo
     * @instance
     */

    /**
     * MyExtensionInfo Id.
     * @member {number} Id
     * @memberof MyExtensionInfo
     * @instance
     */

    /**
     * MyExtensionInfo Number.
     * @member {string} Number
     * @memberof MyExtensionInfo
     * @instance
     */

    /**
     * MyExtensionInfo QueueStatus.
     * @member {boolean} QueueStatus
     * @memberof MyExtensionInfo
     * @instance
     */

    /**
     * MyExtensionInfo ActiveDevices.
     * @member {Registrations} ActiveDevices
     * @memberof MyExtensionInfo
     * @instance
     */

    /**
     * Encodes the specified MyExtensionInfo message. Does not implicitly {@link MyExtensionInfo.verify|verify} messages.
     * @function encode
     * @memberof MyExtensionInfo
     * @static
     * @param {MyExtensionInfo} message MyExtensionInfo message or plain object to encode
     * @param {$protobuf.Writer} [writer] Writer to encode to
     * @returns {$protobuf.Writer} Writer
     */
    MyExtensionInfo.encode = function encode(message, writer) {
        if (!writer)
            writer = $Writer.create();
        writer.uint32(/* id 1, wireType 0 =*/8).int32(message.Action);
        writer.uint32(/* id 2, wireType 0 =*/16).int32(message.Id);
        if (message.Number != null && message.hasOwnProperty("Number"))
            writer.uint32(/* id 3, wireType 2 =*/26).string(message.Number);
        if (message.QueueStatus != null && message.hasOwnProperty("QueueStatus"))
            writer.uint32(/* id 6, wireType 0 =*/48).bool(message.QueueStatus);
        if (message.ActiveDevices != null && message.hasOwnProperty("ActiveDevices"))
            $root.Registrations.encode(message.ActiveDevices, writer.uint32(/* id 9, wireType 2 =*/74).fork()).ldelim();
        return writer;
    };

    /**
     * Decodes a MyExtensionInfo message from the specified reader or buffer.
     * @function decode
     * @memberof MyExtensionInfo
     * @static
     * @param {$protobuf.Reader|Uint8Array} reader Reader or buffer to decode from
     * @param {number} [length] Message length if known beforehand
     * @returns {MyExtensionInfo} MyExtensionInfo
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    MyExtensionInfo.decode = function decode(reader, length) {
        if (!(reader instanceof $Reader))
            reader = $Reader.create(reader);
        let end = length === undefined ? reader.len : reader.pos + length, message = new $root.MyExtensionInfo();
        while (reader.pos < end) {
            let tag = reader.uint32();
            switch (tag >>> 3) {
            case 1:
                message.Action = reader.int32();
                break;
            case 2:
                message.Id = reader.int32();
                break;
            case 3:
                message.Number = reader.string();
                break;
            case 6:
                message.QueueStatus = reader.bool();
                break;
            case 9:
                message.ActiveDevices = $root.Registrations.decode(reader, reader.uint32());
                break;
            default:
                reader.skipType(tag & 7);
                break;
            }
        }
        return message;
    };

    /**
     * Converts a MyExtensionInfo message to GenericMessage
     * @function toGenericMessage
     * @memberof MyExtensionInfo
     * @instance
     * @returns {GenericMessage} GenericMessage
     */
    MyExtensionInfo.prototype.toGenericMessage = function toGenericMessage() {
        return new $root.GenericMessage({MessageId: 201, MyInfo : this});
    };

    return MyExtensionInfo;
})();

export const RequestMyInfo = $root.RequestMyInfo = (() => {

    /**
     * Properties of a RequestMyInfo.
     * @exports IRequestMyInfo
     */

    /**
     * Constructs a new RequestMyInfo.
     * @exports RequestMyInfo
     * @classdesc Represents a RequestMyInfo.
     * @constructor
     * @param {Partial<RequestMyInfo>} [properties] Properties to set
     */
    function RequestMyInfo(properties) {
        if (properties)
            for (let keys = Object.keys(properties), i = 0; i < keys.length; ++i)
                if (properties[keys[i]] != null)
                    this[keys[i]] = properties[keys[i]];
    }

    /**
     * Encodes the specified RequestMyInfo message. Does not implicitly {@link RequestMyInfo.verify|verify} messages.
     * @function encode
     * @memberof RequestMyInfo
     * @static
     * @param {RequestMyInfo} message RequestMyInfo message or plain object to encode
     * @param {$protobuf.Writer} [writer] Writer to encode to
     * @returns {$protobuf.Writer} Writer
     */
    RequestMyInfo.encode = function encode(message, writer) {
        if (!writer)
            writer = $Writer.create();
        return writer;
    };

    /**
     * Decodes a RequestMyInfo message from the specified reader or buffer.
     * @function decode
     * @memberof RequestMyInfo
     * @static
     * @param {$protobuf.Reader|Uint8Array} reader Reader or buffer to decode from
     * @param {number} [length] Message length if known beforehand
     * @returns {RequestMyInfo} RequestMyInfo
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    RequestMyInfo.decode = function decode(reader, length) {
        if (!(reader instanceof $Reader))
            reader = $Reader.create(reader);
        let end = length === undefined ? reader.len : reader.pos + length, message = new $root.RequestMyInfo();
        while (reader.pos < end) {
            let tag = reader.uint32();
            switch (tag >>> 3) {
            default:
                reader.skipType(tag & 7);
                break;
            }
        }
        return message;
    };

    /**
     * Converts a RequestMyInfo message to GenericMessage
     * @function toGenericMessage
     * @memberof RequestMyInfo
     * @instance
     * @returns {GenericMessage} GenericMessage
     */
    RequestMyInfo.prototype.toGenericMessage = function toGenericMessage() {
        return new $root.GenericMessage({MessageId: 102, GetMyInfo : this});
    };

    return RequestMyInfo;
})();

export const ResponseAcknowledge = $root.ResponseAcknowledge = (() => {

    /**
     * Properties of a ResponseAcknowledge.
     * @exports IResponseAcknowledge
     * @property {boolean} Success ResponseAcknowledge Success
     * @property {number} [ErrorCode] ResponseAcknowledge ErrorCode
     * @property {string} [Message] ResponseAcknowledge Message
     * @property {string} [ExceptionType] ResponseAcknowledge ExceptionType
     * @property {string} [ExceptionMessage] ResponseAcknowledge ExceptionMessage
     * @property {ErrorCodes} [ErrorType] ResponseAcknowledge ErrorType
     * @property {string} [Parameter] ResponseAcknowledge Parameter
     */

    /**
     * Constructs a new ResponseAcknowledge.
     * @exports ResponseAcknowledge
     * @classdesc Represents a ResponseAcknowledge.
     * @constructor
     * @param {Partial<ResponseAcknowledge>} [properties] Properties to set
     */
    function ResponseAcknowledge(properties) {
        if (properties)
            for (let keys = Object.keys(properties), i = 0; i < keys.length; ++i)
                if (properties[keys[i]] != null)
                    this[keys[i]] = properties[keys[i]];
    }

    /**
     * ResponseAcknowledge Success.
     * @member {boolean} Success
     * @memberof ResponseAcknowledge
     * @instance
     */

    /**
     * ResponseAcknowledge ErrorCode.
     * @member {number} ErrorCode
     * @memberof ResponseAcknowledge
     * @instance
     */

    /**
     * ResponseAcknowledge Message.
     * @member {string} Message
     * @memberof ResponseAcknowledge
     * @instance
     */

    /**
     * ResponseAcknowledge ExceptionType.
     * @member {string} ExceptionType
     * @memberof ResponseAcknowledge
     * @instance
     */

    /**
     * ResponseAcknowledge ExceptionMessage.
     * @member {string} ExceptionMessage
     * @memberof ResponseAcknowledge
     * @instance
     */

    /**
     * ResponseAcknowledge ErrorType.
     * @member {ErrorCodes} ErrorType
     * @memberof ResponseAcknowledge
     * @instance
     */

    /**
     * ResponseAcknowledge Parameter.
     * @member {string} Parameter
     * @memberof ResponseAcknowledge
     * @instance
     */

    /**
     * Encodes the specified ResponseAcknowledge message. Does not implicitly {@link ResponseAcknowledge.verify|verify} messages.
     * @function encode
     * @memberof ResponseAcknowledge
     * @static
     * @param {ResponseAcknowledge} message ResponseAcknowledge message or plain object to encode
     * @param {$protobuf.Writer} [writer] Writer to encode to
     * @returns {$protobuf.Writer} Writer
     */
    ResponseAcknowledge.encode = function encode(message, writer) {
        if (!writer)
            writer = $Writer.create();
        writer.uint32(/* id 1, wireType 0 =*/8).bool(message.Success);
        if (message.ErrorCode != null && message.hasOwnProperty("ErrorCode"))
            writer.uint32(/* id 2, wireType 0 =*/16).int32(message.ErrorCode);
        if (message.Message != null && message.hasOwnProperty("Message"))
            writer.uint32(/* id 3, wireType 2 =*/26).string(message.Message);
        if (message.ExceptionType != null && message.hasOwnProperty("ExceptionType"))
            writer.uint32(/* id 4, wireType 2 =*/34).string(message.ExceptionType);
        if (message.ExceptionMessage != null && message.hasOwnProperty("ExceptionMessage"))
            writer.uint32(/* id 5, wireType 2 =*/42).string(message.ExceptionMessage);
        if (message.ErrorType != null && message.hasOwnProperty("ErrorType"))
            writer.uint32(/* id 6, wireType 0 =*/48).int32(message.ErrorType);
        if (message.Parameter != null && message.hasOwnProperty("Parameter"))
            writer.uint32(/* id 7, wireType 2 =*/58).string(message.Parameter);
        return writer;
    };

    /**
     * Decodes a ResponseAcknowledge message from the specified reader or buffer.
     * @function decode
     * @memberof ResponseAcknowledge
     * @static
     * @param {$protobuf.Reader|Uint8Array} reader Reader or buffer to decode from
     * @param {number} [length] Message length if known beforehand
     * @returns {ResponseAcknowledge} ResponseAcknowledge
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    ResponseAcknowledge.decode = function decode(reader, length) {
        if (!(reader instanceof $Reader))
            reader = $Reader.create(reader);
        let end = length === undefined ? reader.len : reader.pos + length, message = new $root.ResponseAcknowledge();
        while (reader.pos < end) {
            let tag = reader.uint32();
            switch (tag >>> 3) {
            case 1:
                message.Success = reader.bool();
                break;
            case 2:
                message.ErrorCode = reader.int32();
                break;
            case 3:
                message.Message = reader.string();
                break;
            case 4:
                message.ExceptionType = reader.string();
                break;
            case 5:
                message.ExceptionMessage = reader.string();
                break;
            case 6:
                message.ErrorType = reader.int32();
                break;
            case 7:
                message.Parameter = reader.string();
                break;
            default:
                reader.skipType(tag & 7);
                break;
            }
        }
        return message;
    };

    /**
     * Converts a ResponseAcknowledge message to GenericMessage
     * @function toGenericMessage
     * @memberof ResponseAcknowledge
     * @instance
     * @returns {GenericMessage} GenericMessage
     */
    ResponseAcknowledge.prototype.toGenericMessage = function toGenericMessage() {
        return new $root.GenericMessage({MessageId: 207, Acknowledge : this});
    };

    return ResponseAcknowledge;
})();

export const ChatRecipient = $root.ChatRecipient = (() => {

    /**
     * Properties of a ChatRecipient.
     * @exports IChatRecipient
     * @property {string} ExtNumber ChatRecipient ExtNumber
     * @property {string} [Name] ChatRecipient Name
     * @property {string} [BridgeNumber] ChatRecipient BridgeNumber
     */

    /**
     * Constructs a new ChatRecipient.
     * @exports ChatRecipient
     * @classdesc Represents a ChatRecipient.
     * @constructor
     * @param {Partial<ChatRecipient>} [properties] Properties to set
     */
    function ChatRecipient(properties) {
        if (properties)
            for (let keys = Object.keys(properties), i = 0; i < keys.length; ++i)
                if (properties[keys[i]] != null)
                    this[keys[i]] = properties[keys[i]];
    }

    /**
     * ChatRecipient ExtNumber.
     * @member {string} ExtNumber
     * @memberof ChatRecipient
     * @instance
     */

    /**
     * ChatRecipient Name.
     * @member {string} Name
     * @memberof ChatRecipient
     * @instance
     */

    /**
     * ChatRecipient BridgeNumber.
     * @member {string} BridgeNumber
     * @memberof ChatRecipient
     * @instance
     */

    /**
     * Encodes the specified ChatRecipient message. Does not implicitly {@link ChatRecipient.verify|verify} messages.
     * @function encode
     * @memberof ChatRecipient
     * @static
     * @param {ChatRecipient} message ChatRecipient message or plain object to encode
     * @param {$protobuf.Writer} [writer] Writer to encode to
     * @returns {$protobuf.Writer} Writer
     */
    ChatRecipient.encode = function encode(message, writer) {
        if (!writer)
            writer = $Writer.create();
        writer.uint32(/* id 1, wireType 2 =*/10).string(message.ExtNumber);
        if (message.Name != null && message.hasOwnProperty("Name"))
            writer.uint32(/* id 2, wireType 2 =*/18).string(message.Name);
        if (message.BridgeNumber != null && message.hasOwnProperty("BridgeNumber"))
            writer.uint32(/* id 3, wireType 2 =*/26).string(message.BridgeNumber);
        return writer;
    };

    /**
     * Decodes a ChatRecipient message from the specified reader or buffer.
     * @function decode
     * @memberof ChatRecipient
     * @static
     * @param {$protobuf.Reader|Uint8Array} reader Reader or buffer to decode from
     * @param {number} [length] Message length if known beforehand
     * @returns {ChatRecipient} ChatRecipient
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    ChatRecipient.decode = function decode(reader, length) {
        if (!(reader instanceof $Reader))
            reader = $Reader.create(reader);
        let end = length === undefined ? reader.len : reader.pos + length, message = new $root.ChatRecipient();
        while (reader.pos < end) {
            let tag = reader.uint32();
            switch (tag >>> 3) {
            case 1:
                message.ExtNumber = reader.string();
                break;
            case 2:
                message.Name = reader.string();
                break;
            case 3:
                message.BridgeNumber = reader.string();
                break;
            default:
                reader.skipType(tag & 7);
                break;
            }
        }
        return message;
    };

    return ChatRecipient;
})();

export const ChatMessage = $root.ChatMessage = (() => {

    /**
     * Properties of a ChatMessage.
     * @exports IChatMessage
     * @property {number} Id ChatMessage Id
     * @property {string} SenderNumber ChatMessage SenderNumber
     * @property {string} [SenderName] ChatMessage SenderName
     * @property {string} [SenderBridgeNumber] ChatMessage SenderBridgeNumber
     * @property {ChatRecipient} Recipient ChatMessage Recipient
     * @property {string} [Message] ChatMessage Message
     * @property {DateTime} [Time] ChatMessage Time
     * @property {boolean} IsNew ChatMessage IsNew
     * @property {string} [Party] ChatMessage Party
     * @property {string} [PartyNew] ChatMessage PartyNew
     * @property {ChatFile} [File] ChatMessage File
     */

    /**
     * Constructs a new ChatMessage.
     * @exports ChatMessage
     * @classdesc Represents a ChatMessage.
     * @constructor
     * @param {Partial<ChatMessage>} [properties] Properties to set
     */
    function ChatMessage(properties) {
        if (properties)
            for (let keys = Object.keys(properties), i = 0; i < keys.length; ++i)
                if (properties[keys[i]] != null)
                    this[keys[i]] = properties[keys[i]];
    }

    /**
     * ChatMessage Id.
     * @member {number} Id
     * @memberof ChatMessage
     * @instance
     */

    /**
     * ChatMessage SenderNumber.
     * @member {string} SenderNumber
     * @memberof ChatMessage
     * @instance
     */

    /**
     * ChatMessage SenderName.
     * @member {string} SenderName
     * @memberof ChatMessage
     * @instance
     */

    /**
     * ChatMessage SenderBridgeNumber.
     * @member {string} SenderBridgeNumber
     * @memberof ChatMessage
     * @instance
     */

    /**
     * ChatMessage Recipient.
     * @member {ChatRecipient} Recipient
     * @memberof ChatMessage
     * @instance
     */

    /**
     * ChatMessage Message.
     * @member {string} Message
     * @memberof ChatMessage
     * @instance
     */

    /**
     * ChatMessage Time.
     * @member {DateTime} Time
     * @memberof ChatMessage
     * @instance
     */

    /**
     * ChatMessage IsNew.
     * @member {boolean} IsNew
     * @memberof ChatMessage
     * @instance
     */

    /**
     * ChatMessage Party.
     * @member {string} Party
     * @memberof ChatMessage
     * @instance
     */

    /**
     * ChatMessage PartyNew.
     * @member {string} PartyNew
     * @memberof ChatMessage
     * @instance
     */

    /**
     * ChatMessage File.
     * @member {ChatFile} File
     * @memberof ChatMessage
     * @instance
     */

    /**
     * Encodes the specified ChatMessage message. Does not implicitly {@link ChatMessage.verify|verify} messages.
     * @function encode
     * @memberof ChatMessage
     * @static
     * @param {ChatMessage} message ChatMessage message or plain object to encode
     * @param {$protobuf.Writer} [writer] Writer to encode to
     * @returns {$protobuf.Writer} Writer
     */
    ChatMessage.encode = function encode(message, writer) {
        if (!writer)
            writer = $Writer.create();
        writer.uint32(/* id 1, wireType 0 =*/8).int32(message.Id);
        writer.uint32(/* id 2, wireType 2 =*/18).string(message.SenderNumber);
        if (message.SenderName != null && message.hasOwnProperty("SenderName"))
            writer.uint32(/* id 3, wireType 2 =*/26).string(message.SenderName);
        if (message.SenderBridgeNumber != null && message.hasOwnProperty("SenderBridgeNumber"))
            writer.uint32(/* id 4, wireType 2 =*/34).string(message.SenderBridgeNumber);
        $root.ChatRecipient.encode(message.Recipient, writer.uint32(/* id 5, wireType 2 =*/42).fork()).ldelim();
        if (message.Message != null && message.hasOwnProperty("Message"))
            writer.uint32(/* id 6, wireType 2 =*/50).string(message.Message);
        if (message.Time != null && message.hasOwnProperty("Time"))
            $root.DateTime.encode(message.Time, writer.uint32(/* id 7, wireType 2 =*/58).fork()).ldelim();
        writer.uint32(/* id 8, wireType 0 =*/64).bool(message.IsNew);
        if (message.Party != null && message.hasOwnProperty("Party"))
            writer.uint32(/* id 9, wireType 2 =*/74).string(message.Party);
        if (message.PartyNew != null && message.hasOwnProperty("PartyNew"))
            writer.uint32(/* id 10, wireType 2 =*/82).string(message.PartyNew);
        if (message.File != null && message.hasOwnProperty("File"))
            $root.ChatFile.encode(message.File, writer.uint32(/* id 11, wireType 2 =*/90).fork()).ldelim();
        return writer;
    };

    /**
     * Decodes a ChatMessage message from the specified reader or buffer.
     * @function decode
     * @memberof ChatMessage
     * @static
     * @param {$protobuf.Reader|Uint8Array} reader Reader or buffer to decode from
     * @param {number} [length] Message length if known beforehand
     * @returns {ChatMessage} ChatMessage
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    ChatMessage.decode = function decode(reader, length) {
        if (!(reader instanceof $Reader))
            reader = $Reader.create(reader);
        let end = length === undefined ? reader.len : reader.pos + length, message = new $root.ChatMessage();
        while (reader.pos < end) {
            let tag = reader.uint32();
            switch (tag >>> 3) {
            case 1:
                message.Id = reader.int32();
                break;
            case 2:
                message.SenderNumber = reader.string();
                break;
            case 3:
                message.SenderName = reader.string();
                break;
            case 4:
                message.SenderBridgeNumber = reader.string();
                break;
            case 5:
                message.Recipient = $root.ChatRecipient.decode(reader, reader.uint32());
                break;
            case 6:
                message.Message = reader.string();
                break;
            case 7:
                message.Time = $root.DateTime.decode(reader, reader.uint32());
                break;
            case 8:
                message.IsNew = reader.bool();
                break;
            case 9:
                message.Party = reader.string();
                break;
            case 10:
                message.PartyNew = reader.string();
                break;
            case 11:
                message.File = $root.ChatFile.decode(reader, reader.uint32());
                break;
            default:
                reader.skipType(tag & 7);
                break;
            }
        }
        return message;
    };

    return ChatMessage;
})();

export const ChatFile = $root.ChatFile = (() => {

    /**
     * Properties of a ChatFile.
     * @exports IChatFile
     * @property {string} [FileName] ChatFile FileName
     * @property {string} [FileLink] ChatFile FileLink
     * @property {ChatFileState} [FileState] ChatFile FileState
     * @property {number} [Progress] ChatFile Progress
     * @property {boolean} [HasPreview] ChatFile HasPreview
     * @property {number} [FileSize] ChatFile FileSize
     */

    /**
     * Constructs a new ChatFile.
     * @exports ChatFile
     * @classdesc Represents a ChatFile.
     * @constructor
     * @param {Partial<ChatFile>} [properties] Properties to set
     */
    function ChatFile(properties) {
        if (properties)
            for (let keys = Object.keys(properties), i = 0; i < keys.length; ++i)
                if (properties[keys[i]] != null)
                    this[keys[i]] = properties[keys[i]];
    }

    /**
     * ChatFile FileName.
     * @member {string} FileName
     * @memberof ChatFile
     * @instance
     */

    /**
     * ChatFile FileLink.
     * @member {string} FileLink
     * @memberof ChatFile
     * @instance
     */

    /**
     * ChatFile FileState.
     * @member {ChatFileState} FileState
     * @memberof ChatFile
     * @instance
     */

    /**
     * ChatFile Progress.
     * @member {number} Progress
     * @memberof ChatFile
     * @instance
     */

    /**
     * ChatFile HasPreview.
     * @member {boolean} HasPreview
     * @memberof ChatFile
     * @instance
     */

    /**
     * ChatFile FileSize.
     * @member {number} FileSize
     * @memberof ChatFile
     * @instance
     */

    /**
     * Encodes the specified ChatFile message. Does not implicitly {@link ChatFile.verify|verify} messages.
     * @function encode
     * @memberof ChatFile
     * @static
     * @param {ChatFile} message ChatFile message or plain object to encode
     * @param {$protobuf.Writer} [writer] Writer to encode to
     * @returns {$protobuf.Writer} Writer
     */
    ChatFile.encode = function encode(message, writer) {
        if (!writer)
            writer = $Writer.create();
        if (message.FileName != null && message.hasOwnProperty("FileName"))
            writer.uint32(/* id 1, wireType 2 =*/10).string(message.FileName);
        if (message.FileLink != null && message.hasOwnProperty("FileLink"))
            writer.uint32(/* id 2, wireType 2 =*/18).string(message.FileLink);
        if (message.FileState != null && message.hasOwnProperty("FileState"))
            writer.uint32(/* id 3, wireType 0 =*/24).int32(message.FileState);
        if (message.Progress != null && message.hasOwnProperty("Progress"))
            writer.uint32(/* id 4, wireType 5 =*/37).float(message.Progress);
        if (message.HasPreview != null && message.hasOwnProperty("HasPreview"))
            writer.uint32(/* id 5, wireType 0 =*/40).bool(message.HasPreview);
        if (message.FileSize != null && message.hasOwnProperty("FileSize"))
            writer.uint32(/* id 6, wireType 0 =*/48).uint64(message.FileSize);
        return writer;
    };

    /**
     * Decodes a ChatFile message from the specified reader or buffer.
     * @function decode
     * @memberof ChatFile
     * @static
     * @param {$protobuf.Reader|Uint8Array} reader Reader or buffer to decode from
     * @param {number} [length] Message length if known beforehand
     * @returns {ChatFile} ChatFile
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    ChatFile.decode = function decode(reader, length) {
        if (!(reader instanceof $Reader))
            reader = $Reader.create(reader);
        let end = length === undefined ? reader.len : reader.pos + length, message = new $root.ChatFile();
        while (reader.pos < end) {
            let tag = reader.uint32();
            switch (tag >>> 3) {
            case 1:
                message.FileName = reader.string();
                break;
            case 2:
                message.FileLink = reader.string();
                break;
            case 3:
                message.FileState = reader.int32();
                break;
            case 4:
                message.Progress = reader.float();
                break;
            case 5:
                message.HasPreview = reader.bool();
                break;
            case 6:
                message.FileSize = reader.uint64();
                break;
            default:
                reader.skipType(tag & 7);
                break;
            }
        }
        return message;
    };

    return ChatFile;
})();

export const NotificationChatFileProgress = $root.NotificationChatFileProgress = (() => {

    /**
     * Properties of a NotificationChatFileProgress.
     * @exports INotificationChatFileProgress
     * @property {number} Id NotificationChatFileProgress Id
     * @property {string} Party NotificationChatFileProgress Party
     * @property {ChatFile} [File] NotificationChatFileProgress File
     */

    /**
     * Constructs a new NotificationChatFileProgress.
     * @exports NotificationChatFileProgress
     * @classdesc Represents a NotificationChatFileProgress.
     * @constructor
     * @param {Partial<NotificationChatFileProgress>} [properties] Properties to set
     */
    function NotificationChatFileProgress(properties) {
        if (properties)
            for (let keys = Object.keys(properties), i = 0; i < keys.length; ++i)
                if (properties[keys[i]] != null)
                    this[keys[i]] = properties[keys[i]];
    }

    /**
     * NotificationChatFileProgress Id.
     * @member {number} Id
     * @memberof NotificationChatFileProgress
     * @instance
     */

    /**
     * NotificationChatFileProgress Party.
     * @member {string} Party
     * @memberof NotificationChatFileProgress
     * @instance
     */

    /**
     * NotificationChatFileProgress File.
     * @member {ChatFile} File
     * @memberof NotificationChatFileProgress
     * @instance
     */

    /**
     * Encodes the specified NotificationChatFileProgress message. Does not implicitly {@link NotificationChatFileProgress.verify|verify} messages.
     * @function encode
     * @memberof NotificationChatFileProgress
     * @static
     * @param {NotificationChatFileProgress} message NotificationChatFileProgress message or plain object to encode
     * @param {$protobuf.Writer} [writer] Writer to encode to
     * @returns {$protobuf.Writer} Writer
     */
    NotificationChatFileProgress.encode = function encode(message, writer) {
        if (!writer)
            writer = $Writer.create();
        writer.uint32(/* id 1, wireType 0 =*/8).int32(message.Id);
        writer.uint32(/* id 2, wireType 2 =*/18).string(message.Party);
        if (message.File != null && message.hasOwnProperty("File"))
            $root.ChatFile.encode(message.File, writer.uint32(/* id 3, wireType 2 =*/26).fork()).ldelim();
        return writer;
    };

    /**
     * Decodes a NotificationChatFileProgress message from the specified reader or buffer.
     * @function decode
     * @memberof NotificationChatFileProgress
     * @static
     * @param {$protobuf.Reader|Uint8Array} reader Reader or buffer to decode from
     * @param {number} [length] Message length if known beforehand
     * @returns {NotificationChatFileProgress} NotificationChatFileProgress
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    NotificationChatFileProgress.decode = function decode(reader, length) {
        if (!(reader instanceof $Reader))
            reader = $Reader.create(reader);
        let end = length === undefined ? reader.len : reader.pos + length, message = new $root.NotificationChatFileProgress();
        while (reader.pos < end) {
            let tag = reader.uint32();
            switch (tag >>> 3) {
            case 1:
                message.Id = reader.int32();
                break;
            case 2:
                message.Party = reader.string();
                break;
            case 3:
                message.File = $root.ChatFile.decode(reader, reader.uint32());
                break;
            default:
                reader.skipType(tag & 7);
                break;
            }
        }
        return message;
    };

    /**
     * Converts a NotificationChatFileProgress message to GenericMessage
     * @function toGenericMessage
     * @memberof NotificationChatFileProgress
     * @instance
     * @returns {GenericMessage} GenericMessage
     */
    NotificationChatFileProgress.prototype.toGenericMessage = function toGenericMessage() {
        return new $root.GenericMessage({MessageId: 232, ChatFileProgress : this});
    };

    return NotificationChatFileProgress;
})();

export const RequestSendChatMessage = $root.RequestSendChatMessage = (() => {

    /**
     * Properties of a RequestSendChatMessage.
     * @exports IRequestSendChatMessage
     * @property {string} [Message] RequestSendChatMessage Message
     * @property {Array.<ChatRecipient>} [Recipients] RequestSendChatMessage Recipients
     * @property {string} [SipFrom] RequestSendChatMessage SipFrom
     */

    /**
     * Constructs a new RequestSendChatMessage.
     * @exports RequestSendChatMessage
     * @classdesc Represents a RequestSendChatMessage.
     * @constructor
     * @param {Partial<RequestSendChatMessage>} [properties] Properties to set
     */
    function RequestSendChatMessage(properties) {
        this.Recipients = [];
        if (properties)
            for (let keys = Object.keys(properties), i = 0; i < keys.length; ++i)
                if (properties[keys[i]] != null)
                    this[keys[i]] = properties[keys[i]];
    }

    /**
     * RequestSendChatMessage Message.
     * @member {string} Message
     * @memberof RequestSendChatMessage
     * @instance
     */

    /**
     * RequestSendChatMessage Recipients.
     * @member {Array.<ChatRecipient>} Recipients
     * @memberof RequestSendChatMessage
     * @instance
     */
    RequestSendChatMessage.prototype.Recipients = $util.emptyArray;

    /**
     * RequestSendChatMessage SipFrom.
     * @member {string} SipFrom
     * @memberof RequestSendChatMessage
     * @instance
     */

    /**
     * Encodes the specified RequestSendChatMessage message. Does not implicitly {@link RequestSendChatMessage.verify|verify} messages.
     * @function encode
     * @memberof RequestSendChatMessage
     * @static
     * @param {RequestSendChatMessage} message RequestSendChatMessage message or plain object to encode
     * @param {$protobuf.Writer} [writer] Writer to encode to
     * @returns {$protobuf.Writer} Writer
     */
    RequestSendChatMessage.encode = function encode(message, writer) {
        if (!writer)
            writer = $Writer.create();
        if (message.Message != null && message.hasOwnProperty("Message"))
            writer.uint32(/* id 1, wireType 2 =*/10).string(message.Message);
        if (message.Recipients != null && message.Recipients.length)
            for (let i = 0; i < message.Recipients.length; ++i)
                $root.ChatRecipient.encode(message.Recipients[i], writer.uint32(/* id 2, wireType 2 =*/18).fork()).ldelim();
        if (message.SipFrom != null && message.hasOwnProperty("SipFrom"))
            writer.uint32(/* id 3, wireType 2 =*/26).string(message.SipFrom);
        return writer;
    };

    /**
     * Decodes a RequestSendChatMessage message from the specified reader or buffer.
     * @function decode
     * @memberof RequestSendChatMessage
     * @static
     * @param {$protobuf.Reader|Uint8Array} reader Reader or buffer to decode from
     * @param {number} [length] Message length if known beforehand
     * @returns {RequestSendChatMessage} RequestSendChatMessage
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    RequestSendChatMessage.decode = function decode(reader, length) {
        if (!(reader instanceof $Reader))
            reader = $Reader.create(reader);
        let end = length === undefined ? reader.len : reader.pos + length, message = new $root.RequestSendChatMessage();
        while (reader.pos < end) {
            let tag = reader.uint32();
            switch (tag >>> 3) {
            case 1:
                message.Message = reader.string();
                break;
            case 2:
                if (!(message.Recipients && message.Recipients.length))
                    message.Recipients = [];
                message.Recipients.push($root.ChatRecipient.decode(reader, reader.uint32()));
                break;
            case 3:
                message.SipFrom = reader.string();
                break;
            default:
                reader.skipType(tag & 7);
                break;
            }
        }
        return message;
    };

    /**
     * Converts a RequestSendChatMessage message to GenericMessage
     * @function toGenericMessage
     * @memberof RequestSendChatMessage
     * @instance
     * @returns {GenericMessage} GenericMessage
     */
    RequestSendChatMessage.prototype.toGenericMessage = function toGenericMessage() {
        return new $root.GenericMessage({MessageId: 110, SendChatMessage : this});
    };

    return RequestSendChatMessage;
})();

export const RequestSendChatFile = $root.RequestSendChatFile = (() => {

    /**
     * Properties of a RequestSendChatFile.
     * @exports IRequestSendChatFile
     * @property {string} Name RequestSendChatFile Name
     * @property {string} Party RequestSendChatFile Party
     */

    /**
     * Constructs a new RequestSendChatFile.
     * @exports RequestSendChatFile
     * @classdesc Represents a RequestSendChatFile.
     * @constructor
     * @param {Partial<RequestSendChatFile>} [properties] Properties to set
     */
    function RequestSendChatFile(properties) {
        if (properties)
            for (let keys = Object.keys(properties), i = 0; i < keys.length; ++i)
                if (properties[keys[i]] != null)
                    this[keys[i]] = properties[keys[i]];
    }

    /**
     * RequestSendChatFile Name.
     * @member {string} Name
     * @memberof RequestSendChatFile
     * @instance
     */

    /**
     * RequestSendChatFile Party.
     * @member {string} Party
     * @memberof RequestSendChatFile
     * @instance
     */

    /**
     * Encodes the specified RequestSendChatFile message. Does not implicitly {@link RequestSendChatFile.verify|verify} messages.
     * @function encode
     * @memberof RequestSendChatFile
     * @static
     * @param {RequestSendChatFile} message RequestSendChatFile message or plain object to encode
     * @param {$protobuf.Writer} [writer] Writer to encode to
     * @returns {$protobuf.Writer} Writer
     */
    RequestSendChatFile.encode = function encode(message, writer) {
        if (!writer)
            writer = $Writer.create();
        writer.uint32(/* id 1, wireType 2 =*/10).string(message.Name);
        writer.uint32(/* id 2, wireType 2 =*/18).string(message.Party);
        return writer;
    };

    /**
     * Decodes a RequestSendChatFile message from the specified reader or buffer.
     * @function decode
     * @memberof RequestSendChatFile
     * @static
     * @param {$protobuf.Reader|Uint8Array} reader Reader or buffer to decode from
     * @param {number} [length] Message length if known beforehand
     * @returns {RequestSendChatFile} RequestSendChatFile
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    RequestSendChatFile.decode = function decode(reader, length) {
        if (!(reader instanceof $Reader))
            reader = $Reader.create(reader);
        let end = length === undefined ? reader.len : reader.pos + length, message = new $root.RequestSendChatFile();
        while (reader.pos < end) {
            let tag = reader.uint32();
            switch (tag >>> 3) {
            case 1:
                message.Name = reader.string();
                break;
            case 2:
                message.Party = reader.string();
                break;
            default:
                reader.skipType(tag & 7);
                break;
            }
        }
        return message;
    };

    /**
     * Converts a RequestSendChatFile message to GenericMessage
     * @function toGenericMessage
     * @memberof RequestSendChatFile
     * @instance
     * @returns {GenericMessage} GenericMessage
     */
    RequestSendChatFile.prototype.toGenericMessage = function toGenericMessage() {
        return new $root.GenericMessage({MessageId: 179, SendChatFile : this});
    };

    return RequestSendChatFile;
})();

export const ResponseMyMessages = $root.ResponseMyMessages = (() => {

    /**
     * Properties of a ResponseMyMessages.
     * @exports IResponseMyMessages
     * @property {Array.<ChatMessage>} [Messages] ResponseMyMessages Messages
     */

    /**
     * Constructs a new ResponseMyMessages.
     * @exports ResponseMyMessages
     * @classdesc Represents a ResponseMyMessages.
     * @constructor
     * @param {Partial<ResponseMyMessages>} [properties] Properties to set
     */
    function ResponseMyMessages(properties) {
        this.Messages = [];
        if (properties)
            for (let keys = Object.keys(properties), i = 0; i < keys.length; ++i)
                if (properties[keys[i]] != null)
                    this[keys[i]] = properties[keys[i]];
    }

    /**
     * ResponseMyMessages Messages.
     * @member {Array.<ChatMessage>} Messages
     * @memberof ResponseMyMessages
     * @instance
     */
    ResponseMyMessages.prototype.Messages = $util.emptyArray;

    /**
     * Encodes the specified ResponseMyMessages message. Does not implicitly {@link ResponseMyMessages.verify|verify} messages.
     * @function encode
     * @memberof ResponseMyMessages
     * @static
     * @param {ResponseMyMessages} message ResponseMyMessages message or plain object to encode
     * @param {$protobuf.Writer} [writer] Writer to encode to
     * @returns {$protobuf.Writer} Writer
     */
    ResponseMyMessages.encode = function encode(message, writer) {
        if (!writer)
            writer = $Writer.create();
        if (message.Messages != null && message.Messages.length)
            for (let i = 0; i < message.Messages.length; ++i)
                $root.ChatMessage.encode(message.Messages[i], writer.uint32(/* id 1, wireType 2 =*/10).fork()).ldelim();
        return writer;
    };

    /**
     * Decodes a ResponseMyMessages message from the specified reader or buffer.
     * @function decode
     * @memberof ResponseMyMessages
     * @static
     * @param {$protobuf.Reader|Uint8Array} reader Reader or buffer to decode from
     * @param {number} [length] Message length if known beforehand
     * @returns {ResponseMyMessages} ResponseMyMessages
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    ResponseMyMessages.decode = function decode(reader, length) {
        if (!(reader instanceof $Reader))
            reader = $Reader.create(reader);
        let end = length === undefined ? reader.len : reader.pos + length, message = new $root.ResponseMyMessages();
        while (reader.pos < end) {
            let tag = reader.uint32();
            switch (tag >>> 3) {
            case 1:
                if (!(message.Messages && message.Messages.length))
                    message.Messages = [];
                message.Messages.push($root.ChatMessage.decode(reader, reader.uint32()));
                break;
            default:
                reader.skipType(tag & 7);
                break;
            }
        }
        return message;
    };

    /**
     * Converts a ResponseMyMessages message to GenericMessage
     * @function toGenericMessage
     * @memberof ResponseMyMessages
     * @instance
     * @returns {GenericMessage} GenericMessage
     */
    ResponseMyMessages.prototype.toGenericMessage = function toGenericMessage() {
        return new $root.GenericMessage({MessageId: 209, MyChatMessages : this});
    };

    return ResponseMyMessages;
})();

export const RequestSetChatReceived = $root.RequestSetChatReceived = (() => {

    /**
     * Properties of a RequestSetChatReceived.
     * @exports IRequestSetChatReceived
     * @property {Array.<number>} [Items] RequestSetChatReceived Items
     */

    /**
     * Constructs a new RequestSetChatReceived.
     * @exports RequestSetChatReceived
     * @classdesc Represents a RequestSetChatReceived.
     * @constructor
     * @param {Partial<RequestSetChatReceived>} [properties] Properties to set
     */
    function RequestSetChatReceived(properties) {
        this.Items = [];
        if (properties)
            for (let keys = Object.keys(properties), i = 0; i < keys.length; ++i)
                if (properties[keys[i]] != null)
                    this[keys[i]] = properties[keys[i]];
    }

    /**
     * RequestSetChatReceived Items.
     * @member {Array.<number>} Items
     * @memberof RequestSetChatReceived
     * @instance
     */
    RequestSetChatReceived.prototype.Items = $util.emptyArray;

    /**
     * Encodes the specified RequestSetChatReceived message. Does not implicitly {@link RequestSetChatReceived.verify|verify} messages.
     * @function encode
     * @memberof RequestSetChatReceived
     * @static
     * @param {RequestSetChatReceived} message RequestSetChatReceived message or plain object to encode
     * @param {$protobuf.Writer} [writer] Writer to encode to
     * @returns {$protobuf.Writer} Writer
     */
    RequestSetChatReceived.encode = function encode(message, writer) {
        if (!writer)
            writer = $Writer.create();
        if (message.Items != null && message.Items.length)
            for (let i = 0; i < message.Items.length; ++i)
                writer.uint32(/* id 1, wireType 0 =*/8).int32(message.Items[i]);
        return writer;
    };

    /**
     * Decodes a RequestSetChatReceived message from the specified reader or buffer.
     * @function decode
     * @memberof RequestSetChatReceived
     * @static
     * @param {$protobuf.Reader|Uint8Array} reader Reader or buffer to decode from
     * @param {number} [length] Message length if known beforehand
     * @returns {RequestSetChatReceived} RequestSetChatReceived
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    RequestSetChatReceived.decode = function decode(reader, length) {
        if (!(reader instanceof $Reader))
            reader = $Reader.create(reader);
        let end = length === undefined ? reader.len : reader.pos + length, message = new $root.RequestSetChatReceived();
        while (reader.pos < end) {
            let tag = reader.uint32();
            switch (tag >>> 3) {
            case 1:
                if (!(message.Items && message.Items.length))
                    message.Items = [];
                if ((tag & 7) === 2) {
                    let end2 = reader.uint32() + reader.pos;
                    while (reader.pos < end2)
                        message.Items.push(reader.int32());
                } else
                    message.Items.push(reader.int32());
                break;
            default:
                reader.skipType(tag & 7);
                break;
            }
        }
        return message;
    };

    /**
     * Converts a RequestSetChatReceived message to GenericMessage
     * @function toGenericMessage
     * @memberof RequestSetChatReceived
     * @instance
     * @returns {GenericMessage} GenericMessage
     */
    RequestSetChatReceived.prototype.toGenericMessage = function toGenericMessage() {
        return new $root.GenericMessage({MessageId: 112, MessagesReceived : this});
    };

    return RequestSetChatReceived;
})();

export const MyWebRTCEndpoint = $root.MyWebRTCEndpoint = (() => {

    /**
     * Properties of a MyWebRTCEndpoint.
     * @exports IMyWebRTCEndpoint
     * @property {ActionType} Action MyWebRTCEndpoint Action
     * @property {Array.<WebRTCCall>} [Items] MyWebRTCEndpoint Items
     * @property {boolean} [isWebRTCEnpointRegistered] MyWebRTCEndpoint isWebRTCEnpointRegistered
     * @property {string} [DeviceContact] MyWebRTCEndpoint DeviceContact
     */

    /**
     * Constructs a new MyWebRTCEndpoint.
     * @exports MyWebRTCEndpoint
     * @classdesc ======================================================================
     * @constructor
     * @param {Partial<MyWebRTCEndpoint>} [properties] Properties to set
     */
    function MyWebRTCEndpoint(properties) {
        this.Items = [];
        if (properties)
            for (let keys = Object.keys(properties), i = 0; i < keys.length; ++i)
                if (properties[keys[i]] != null)
                    this[keys[i]] = properties[keys[i]];
    }

    /**
     * MyWebRTCEndpoint Action.
     * @member {ActionType} Action
     * @memberof MyWebRTCEndpoint
     * @instance
     */

    /**
     * MyWebRTCEndpoint Items.
     * @member {Array.<WebRTCCall>} Items
     * @memberof MyWebRTCEndpoint
     * @instance
     */
    MyWebRTCEndpoint.prototype.Items = $util.emptyArray;

    /**
     * MyWebRTCEndpoint isWebRTCEnpointRegistered.
     * @member {boolean} isWebRTCEnpointRegistered
     * @memberof MyWebRTCEndpoint
     * @instance
     */

    /**
     * MyWebRTCEndpoint DeviceContact.
     * @member {string} DeviceContact
     * @memberof MyWebRTCEndpoint
     * @instance
     */

    /**
     * Encodes the specified MyWebRTCEndpoint message. Does not implicitly {@link MyWebRTCEndpoint.verify|verify} messages.
     * @function encode
     * @memberof MyWebRTCEndpoint
     * @static
     * @param {MyWebRTCEndpoint} message MyWebRTCEndpoint message or plain object to encode
     * @param {$protobuf.Writer} [writer] Writer to encode to
     * @returns {$protobuf.Writer} Writer
     */
    MyWebRTCEndpoint.encode = function encode(message, writer) {
        if (!writer)
            writer = $Writer.create();
        writer.uint32(/* id 1, wireType 0 =*/8).int32(message.Action);
        if (message.Items != null && message.Items.length)
            for (let i = 0; i < message.Items.length; ++i)
                $root.WebRTCCall.encode(message.Items[i], writer.uint32(/* id 2, wireType 2 =*/18).fork()).ldelim();
        if (message.isWebRTCEnpointRegistered != null && message.hasOwnProperty("isWebRTCEnpointRegistered"))
            writer.uint32(/* id 3, wireType 0 =*/24).bool(message.isWebRTCEnpointRegistered);
        if (message.DeviceContact != null && message.hasOwnProperty("DeviceContact"))
            writer.uint32(/* id 4, wireType 2 =*/34).string(message.DeviceContact);
        return writer;
    };

    /**
     * Decodes a MyWebRTCEndpoint message from the specified reader or buffer.
     * @function decode
     * @memberof MyWebRTCEndpoint
     * @static
     * @param {$protobuf.Reader|Uint8Array} reader Reader or buffer to decode from
     * @param {number} [length] Message length if known beforehand
     * @returns {MyWebRTCEndpoint} MyWebRTCEndpoint
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    MyWebRTCEndpoint.decode = function decode(reader, length) {
        if (!(reader instanceof $Reader))
            reader = $Reader.create(reader);
        let end = length === undefined ? reader.len : reader.pos + length, message = new $root.MyWebRTCEndpoint();
        while (reader.pos < end) {
            let tag = reader.uint32();
            switch (tag >>> 3) {
            case 1:
                message.Action = reader.int32();
                break;
            case 2:
                if (!(message.Items && message.Items.length))
                    message.Items = [];
                message.Items.push($root.WebRTCCall.decode(reader, reader.uint32()));
                break;
            case 3:
                message.isWebRTCEnpointRegistered = reader.bool();
                break;
            case 4:
                message.DeviceContact = reader.string();
                break;
            default:
                reader.skipType(tag & 7);
                break;
            }
        }
        return message;
    };

    /**
     * Converts a MyWebRTCEndpoint message to GenericMessage
     * @function toGenericMessage
     * @memberof MyWebRTCEndpoint
     * @instance
     * @returns {GenericMessage} GenericMessage
     */
    MyWebRTCEndpoint.prototype.toGenericMessage = function toGenericMessage() {
        return new $root.GenericMessage({MessageId: 227, webRTCEndpoint : this});
    };

    return MyWebRTCEndpoint;
})();

/**
 * WebRTCEndpointSDPState enum.
 * @exports WebRTCEndpointSDPState
 * @enum {string}
 * @property {number} WRTCTerminate=0 WRTCTerminate value
 * @property {number} WRTCOffer=1 WRTCOffer value
 * @property {number} WRTCAnswer=2 WRTCAnswer value
 * @property {number} WRTCConfirm=3 WRTCConfirm value
 * @property {number} WRTCRequestForOffer=4 WRTCRequestForOffer value
 * @property {number} WRTCReject=5 WRTCReject value
 * @property {number} WRTCProcessingOffer=6 WRTCProcessingOffer value
 * @property {number} WRTCPreparingOffer=7 WRTCPreparingOffer value
 * @property {number} WRTCAnswerProvided=8 WRTCAnswerProvided value
 * @property {number} WRTCConfirmed=9 WRTCConfirmed value
 * @property {number} WRTCInitial=10 WRTCInitial value
 */
export const WebRTCEndpointSDPState = $root.WebRTCEndpointSDPState = (() => {
    const valuesById = {}, values = Object.create(valuesById);
    values[valuesById[0] = "WRTCTerminate"] = 0;
    values[valuesById[1] = "WRTCOffer"] = 1;
    values[valuesById[2] = "WRTCAnswer"] = 2;
    values[valuesById[3] = "WRTCConfirm"] = 3;
    values[valuesById[4] = "WRTCRequestForOffer"] = 4;
    values[valuesById[5] = "WRTCReject"] = 5;
    values[valuesById[6] = "WRTCProcessingOffer"] = 6;
    values[valuesById[7] = "WRTCPreparingOffer"] = 7;
    values[valuesById[8] = "WRTCAnswerProvided"] = 8;
    values[valuesById[9] = "WRTCConfirmed"] = 9;
    values[valuesById[10] = "WRTCInitial"] = 10;
    return values;
})();

/**
 * WebRTCHoldState enum.
 * @exports WebRTCHoldState
 * @enum {string}
 * @property {number} WebRTCHoldState_NOHOLD=0 WebRTCHoldState_NOHOLD value
 * @property {number} WebRTCHoldState_HELD=1 WebRTCHoldState_HELD value
 * @property {number} WebRTCHoldState_HOLD=2 WebRTCHoldState_HOLD value
 * @property {number} WebRTCHoldState_BOTH=3 WebRTCHoldState_BOTH value
 */
export const WebRTCHoldState = $root.WebRTCHoldState = (() => {
    const valuesById = {}, values = Object.create(valuesById);
    values[valuesById[0] = "WebRTCHoldState_NOHOLD"] = 0;
    values[valuesById[1] = "WebRTCHoldState_HELD"] = 1;
    values[valuesById[2] = "WebRTCHoldState_HOLD"] = 2;
    values[valuesById[3] = "WebRTCHoldState_BOTH"] = 3;
    return values;
})();

export const WebRTCCall = $root.WebRTCCall = (() => {

    /**
     * Properties of a WebRTCCall.
     * @exports IWebRTCCall
     * @property {ActionType} Action WebRTCCall Action
     * @property {number} Id WebRTCCall Id
     * @property {WebRTCEndpointSDPState} sdpType WebRTCCall sdpType
     * @property {string} [otherPartyDisplayname] WebRTCCall otherPartyDisplayname
     * @property {string} [otherPartyNumber] WebRTCCall otherPartyNumber
     * @property {number} [transactionId] WebRTCCall transactionId
     * @property {string} [sdp] WebRTCCall sdp
     * @property {string} [SIPDialogID] WebRTCCall SIPDialogID
     * @property {WebRTCHoldState} [holdState] WebRTCCall holdState
     */

    /**
     * Constructs a new WebRTCCall.
     * @exports WebRTCCall
     * @classdesc Represents a WebRTCCall.
     * @constructor
     * @param {Partial<WebRTCCall>} [properties] Properties to set
     */
    function WebRTCCall(properties) {
        if (properties)
            for (let keys = Object.keys(properties), i = 0; i < keys.length; ++i)
                if (properties[keys[i]] != null)
                    this[keys[i]] = properties[keys[i]];
    }

    /**
     * WebRTCCall Action.
     * @member {ActionType} Action
     * @memberof WebRTCCall
     * @instance
     */

    /**
     * WebRTCCall Id.
     * @member {number} Id
     * @memberof WebRTCCall
     * @instance
     */

    /**
     * WebRTCCall sdpType.
     * @member {WebRTCEndpointSDPState} sdpType
     * @memberof WebRTCCall
     * @instance
     */

    /**
     * WebRTCCall otherPartyDisplayname.
     * @member {string} otherPartyDisplayname
     * @memberof WebRTCCall
     * @instance
     */

    /**
     * WebRTCCall otherPartyNumber.
     * @member {string} otherPartyNumber
     * @memberof WebRTCCall
     * @instance
     */

    /**
     * WebRTCCall transactionId.
     * @member {number} transactionId
     * @memberof WebRTCCall
     * @instance
     */

    /**
     * WebRTCCall sdp.
     * @member {string} sdp
     * @memberof WebRTCCall
     * @instance
     */

    /**
     * WebRTCCall SIPDialogID.
     * @member {string} SIPDialogID
     * @memberof WebRTCCall
     * @instance
     */

    /**
     * WebRTCCall holdState.
     * @member {WebRTCHoldState} holdState
     * @memberof WebRTCCall
     * @instance
     */

    /**
     * Encodes the specified WebRTCCall message. Does not implicitly {@link WebRTCCall.verify|verify} messages.
     * @function encode
     * @memberof WebRTCCall
     * @static
     * @param {WebRTCCall} message WebRTCCall message or plain object to encode
     * @param {$protobuf.Writer} [writer] Writer to encode to
     * @returns {$protobuf.Writer} Writer
     */
    WebRTCCall.encode = function encode(message, writer) {
        if (!writer)
            writer = $Writer.create();
        writer.uint32(/* id 1, wireType 0 =*/8).int32(message.Action);
        writer.uint32(/* id 2, wireType 0 =*/16).int32(message.Id);
        writer.uint32(/* id 3, wireType 0 =*/24).int32(message.sdpType);
        if (message.otherPartyDisplayname != null && message.hasOwnProperty("otherPartyDisplayname"))
            writer.uint32(/* id 4, wireType 2 =*/34).string(message.otherPartyDisplayname);
        if (message.otherPartyNumber != null && message.hasOwnProperty("otherPartyNumber"))
            writer.uint32(/* id 5, wireType 2 =*/42).string(message.otherPartyNumber);
        if (message.transactionId != null && message.hasOwnProperty("transactionId"))
            writer.uint32(/* id 6, wireType 0 =*/48).int32(message.transactionId);
        if (message.sdp != null && message.hasOwnProperty("sdp"))
            writer.uint32(/* id 7, wireType 2 =*/58).string(message.sdp);
        if (message.SIPDialogID != null && message.hasOwnProperty("SIPDialogID"))
            writer.uint32(/* id 8, wireType 2 =*/66).string(message.SIPDialogID);
        if (message.holdState != null && message.hasOwnProperty("holdState"))
            writer.uint32(/* id 9, wireType 0 =*/72).int32(message.holdState);
        return writer;
    };

    /**
     * Decodes a WebRTCCall message from the specified reader or buffer.
     * @function decode
     * @memberof WebRTCCall
     * @static
     * @param {$protobuf.Reader|Uint8Array} reader Reader or buffer to decode from
     * @param {number} [length] Message length if known beforehand
     * @returns {WebRTCCall} WebRTCCall
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    WebRTCCall.decode = function decode(reader, length) {
        if (!(reader instanceof $Reader))
            reader = $Reader.create(reader);
        let end = length === undefined ? reader.len : reader.pos + length, message = new $root.WebRTCCall();
        while (reader.pos < end) {
            let tag = reader.uint32();
            switch (tag >>> 3) {
            case 1:
                message.Action = reader.int32();
                break;
            case 2:
                message.Id = reader.int32();
                break;
            case 3:
                message.sdpType = reader.int32();
                break;
            case 4:
                message.otherPartyDisplayname = reader.string();
                break;
            case 5:
                message.otherPartyNumber = reader.string();
                break;
            case 6:
                message.transactionId = reader.int32();
                break;
            case 7:
                message.sdp = reader.string();
                break;
            case 8:
                message.SIPDialogID = reader.string();
                break;
            case 9:
                message.holdState = reader.int32();
                break;
            default:
                reader.skipType(tag & 7);
                break;
            }
        }
        return message;
    };

    return WebRTCCall;
})();

export const RequestWebRTCChangeSDPState = $root.RequestWebRTCChangeSDPState = (() => {

    /**
     * Properties of a RequestWebRTCChangeSDPState.
     * @exports IRequestWebRTCChangeSDPState
     * @property {number} Id RequestWebRTCChangeSDPState Id
     * @property {WebRTCEndpointSDPState} sdpType RequestWebRTCChangeSDPState sdpType
     * @property {number} [transactionId] RequestWebRTCChangeSDPState transactionId
     * @property {string} [sdp] RequestWebRTCChangeSDPState sdp
     * @property {string} [destinationNumber] RequestWebRTCChangeSDPState destinationNumber
     * @property {string} [CallerDisplayName] RequestWebRTCChangeSDPState CallerDisplayName
     * @property {string} [CallerID] RequestWebRTCChangeSDPState CallerID
     */

    /**
     * Constructs a new RequestWebRTCChangeSDPState.
     * @exports RequestWebRTCChangeSDPState
     * @classdesc Represents a RequestWebRTCChangeSDPState.
     * @constructor
     * @param {Partial<RequestWebRTCChangeSDPState>} [properties] Properties to set
     */
    function RequestWebRTCChangeSDPState(properties) {
        if (properties)
            for (let keys = Object.keys(properties), i = 0; i < keys.length; ++i)
                if (properties[keys[i]] != null)
                    this[keys[i]] = properties[keys[i]];
    }

    /**
     * RequestWebRTCChangeSDPState Id.
     * @member {number} Id
     * @memberof RequestWebRTCChangeSDPState
     * @instance
     */

    /**
     * RequestWebRTCChangeSDPState sdpType.
     * @member {WebRTCEndpointSDPState} sdpType
     * @memberof RequestWebRTCChangeSDPState
     * @instance
     */

    /**
     * RequestWebRTCChangeSDPState transactionId.
     * @member {number} transactionId
     * @memberof RequestWebRTCChangeSDPState
     * @instance
     */

    /**
     * RequestWebRTCChangeSDPState sdp.
     * @member {string} sdp
     * @memberof RequestWebRTCChangeSDPState
     * @instance
     */

    /**
     * RequestWebRTCChangeSDPState destinationNumber.
     * @member {string} destinationNumber
     * @memberof RequestWebRTCChangeSDPState
     * @instance
     */

    /**
     * RequestWebRTCChangeSDPState CallerDisplayName.
     * @member {string} CallerDisplayName
     * @memberof RequestWebRTCChangeSDPState
     * @instance
     */

    /**
     * RequestWebRTCChangeSDPState CallerID.
     * @member {string} CallerID
     * @memberof RequestWebRTCChangeSDPState
     * @instance
     */

    /**
     * Encodes the specified RequestWebRTCChangeSDPState message. Does not implicitly {@link RequestWebRTCChangeSDPState.verify|verify} messages.
     * @function encode
     * @memberof RequestWebRTCChangeSDPState
     * @static
     * @param {RequestWebRTCChangeSDPState} message RequestWebRTCChangeSDPState message or plain object to encode
     * @param {$protobuf.Writer} [writer] Writer to encode to
     * @returns {$protobuf.Writer} Writer
     */
    RequestWebRTCChangeSDPState.encode = function encode(message, writer) {
        if (!writer)
            writer = $Writer.create();
        writer.uint32(/* id 1, wireType 0 =*/8).int32(message.Id);
        writer.uint32(/* id 2, wireType 0 =*/16).int32(message.sdpType);
        if (message.transactionId != null && message.hasOwnProperty("transactionId"))
            writer.uint32(/* id 3, wireType 0 =*/24).int32(message.transactionId);
        if (message.sdp != null && message.hasOwnProperty("sdp"))
            writer.uint32(/* id 4, wireType 2 =*/34).string(message.sdp);
        if (message.destinationNumber != null && message.hasOwnProperty("destinationNumber"))
            writer.uint32(/* id 5, wireType 2 =*/42).string(message.destinationNumber);
        if (message.CallerDisplayName != null && message.hasOwnProperty("CallerDisplayName"))
            writer.uint32(/* id 6, wireType 2 =*/50).string(message.CallerDisplayName);
        if (message.CallerID != null && message.hasOwnProperty("CallerID"))
            writer.uint32(/* id 7, wireType 2 =*/58).string(message.CallerID);
        return writer;
    };

    /**
     * Decodes a RequestWebRTCChangeSDPState message from the specified reader or buffer.
     * @function decode
     * @memberof RequestWebRTCChangeSDPState
     * @static
     * @param {$protobuf.Reader|Uint8Array} reader Reader or buffer to decode from
     * @param {number} [length] Message length if known beforehand
     * @returns {RequestWebRTCChangeSDPState} RequestWebRTCChangeSDPState
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    RequestWebRTCChangeSDPState.decode = function decode(reader, length) {
        if (!(reader instanceof $Reader))
            reader = $Reader.create(reader);
        let end = length === undefined ? reader.len : reader.pos + length, message = new $root.RequestWebRTCChangeSDPState();
        while (reader.pos < end) {
            let tag = reader.uint32();
            switch (tag >>> 3) {
            case 1:
                message.Id = reader.int32();
                break;
            case 2:
                message.sdpType = reader.int32();
                break;
            case 3:
                message.transactionId = reader.int32();
                break;
            case 4:
                message.sdp = reader.string();
                break;
            case 5:
                message.destinationNumber = reader.string();
                break;
            case 6:
                message.CallerDisplayName = reader.string();
                break;
            case 7:
                message.CallerID = reader.string();
                break;
            default:
                reader.skipType(tag & 7);
                break;
            }
        }
        return message;
    };

    /**
     * Converts a RequestWebRTCChangeSDPState message to GenericMessage
     * @function toGenericMessage
     * @memberof RequestWebRTCChangeSDPState
     * @instance
     * @returns {GenericMessage} GenericMessage
     */
    RequestWebRTCChangeSDPState.prototype.toGenericMessage = function toGenericMessage() {
        return new $root.GenericMessage({MessageId: 164, ChangeSDPState : this});
    };

    return RequestWebRTCChangeSDPState;
})();

export const ResponseWebRTCChangeSDPState = $root.ResponseWebRTCChangeSDPState = (() => {

    /**
     * Properties of a ResponseWebRTCChangeSDPState.
     * @exports IResponseWebRTCChangeSDPState
     * @property {boolean} Success ResponseWebRTCChangeSDPState Success
     * @property {string} [Message] ResponseWebRTCChangeSDPState Message
     * @property {number} [CallId] ResponseWebRTCChangeSDPState CallId
     */

    /**
     * Constructs a new ResponseWebRTCChangeSDPState.
     * @exports ResponseWebRTCChangeSDPState
     * @classdesc Represents a ResponseWebRTCChangeSDPState.
     * @constructor
     * @param {Partial<ResponseWebRTCChangeSDPState>} [properties] Properties to set
     */
    function ResponseWebRTCChangeSDPState(properties) {
        if (properties)
            for (let keys = Object.keys(properties), i = 0; i < keys.length; ++i)
                if (properties[keys[i]] != null)
                    this[keys[i]] = properties[keys[i]];
    }

    /**
     * ResponseWebRTCChangeSDPState Success.
     * @member {boolean} Success
     * @memberof ResponseWebRTCChangeSDPState
     * @instance
     */

    /**
     * ResponseWebRTCChangeSDPState Message.
     * @member {string} Message
     * @memberof ResponseWebRTCChangeSDPState
     * @instance
     */

    /**
     * ResponseWebRTCChangeSDPState CallId.
     * @member {number} CallId
     * @memberof ResponseWebRTCChangeSDPState
     * @instance
     */

    /**
     * Encodes the specified ResponseWebRTCChangeSDPState message. Does not implicitly {@link ResponseWebRTCChangeSDPState.verify|verify} messages.
     * @function encode
     * @memberof ResponseWebRTCChangeSDPState
     * @static
     * @param {ResponseWebRTCChangeSDPState} message ResponseWebRTCChangeSDPState message or plain object to encode
     * @param {$protobuf.Writer} [writer] Writer to encode to
     * @returns {$protobuf.Writer} Writer
     */
    ResponseWebRTCChangeSDPState.encode = function encode(message, writer) {
        if (!writer)
            writer = $Writer.create();
        writer.uint32(/* id 1, wireType 0 =*/8).bool(message.Success);
        if (message.Message != null && message.hasOwnProperty("Message"))
            writer.uint32(/* id 2, wireType 2 =*/18).string(message.Message);
        if (message.CallId != null && message.hasOwnProperty("CallId"))
            writer.uint32(/* id 3, wireType 0 =*/24).int32(message.CallId);
        return writer;
    };

    /**
     * Decodes a ResponseWebRTCChangeSDPState message from the specified reader or buffer.
     * @function decode
     * @memberof ResponseWebRTCChangeSDPState
     * @static
     * @param {$protobuf.Reader|Uint8Array} reader Reader or buffer to decode from
     * @param {number} [length] Message length if known beforehand
     * @returns {ResponseWebRTCChangeSDPState} ResponseWebRTCChangeSDPState
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    ResponseWebRTCChangeSDPState.decode = function decode(reader, length) {
        if (!(reader instanceof $Reader))
            reader = $Reader.create(reader);
        let end = length === undefined ? reader.len : reader.pos + length, message = new $root.ResponseWebRTCChangeSDPState();
        while (reader.pos < end) {
            let tag = reader.uint32();
            switch (tag >>> 3) {
            case 1:
                message.Success = reader.bool();
                break;
            case 2:
                message.Message = reader.string();
                break;
            case 3:
                message.CallId = reader.int32();
                break;
            default:
                reader.skipType(tag & 7);
                break;
            }
        }
        return message;
    };

    /**
     * Converts a ResponseWebRTCChangeSDPState message to GenericMessage
     * @function toGenericMessage
     * @memberof ResponseWebRTCChangeSDPState
     * @instance
     * @returns {GenericMessage} GenericMessage
     */
    ResponseWebRTCChangeSDPState.prototype.toGenericMessage = function toGenericMessage() {
        return new $root.GenericMessage({MessageId: 228, ChangeSDPStateResponse : this});
    };

    return ResponseWebRTCChangeSDPState;
})();

export const WebRTCTransferCall = $root.WebRTCTransferCall = (() => {

    /**
     * Properties of a WebRTCTransferCall.
     * @exports IWebRTCTransferCall
     * @property {number} Id WebRTCTransferCall Id
     * @property {string} [destination] WebRTCTransferCall destination
     * @property {number} [ToCallId] WebRTCTransferCall ToCallId
     */

    /**
     * Constructs a new WebRTCTransferCall.
     * @exports WebRTCTransferCall
     * @classdesc Represents a WebRTCTransferCall.
     * @constructor
     * @param {Partial<WebRTCTransferCall>} [properties] Properties to set
     */
    function WebRTCTransferCall(properties) {
        if (properties)
            for (let keys = Object.keys(properties), i = 0; i < keys.length; ++i)
                if (properties[keys[i]] != null)
                    this[keys[i]] = properties[keys[i]];
    }

    /**
     * WebRTCTransferCall Id.
     * @member {number} Id
     * @memberof WebRTCTransferCall
     * @instance
     */

    /**
     * WebRTCTransferCall destination.
     * @member {string} destination
     * @memberof WebRTCTransferCall
     * @instance
     */

    /**
     * WebRTCTransferCall ToCallId.
     * @member {number} ToCallId
     * @memberof WebRTCTransferCall
     * @instance
     */

    /**
     * Encodes the specified WebRTCTransferCall message. Does not implicitly {@link WebRTCTransferCall.verify|verify} messages.
     * @function encode
     * @memberof WebRTCTransferCall
     * @static
     * @param {WebRTCTransferCall} message WebRTCTransferCall message or plain object to encode
     * @param {$protobuf.Writer} [writer] Writer to encode to
     * @returns {$protobuf.Writer} Writer
     */
    WebRTCTransferCall.encode = function encode(message, writer) {
        if (!writer)
            writer = $Writer.create();
        writer.uint32(/* id 1, wireType 0 =*/8).int32(message.Id);
        if (message.destination != null && message.hasOwnProperty("destination"))
            writer.uint32(/* id 2, wireType 2 =*/18).string(message.destination);
        if (message.ToCallId != null && message.hasOwnProperty("ToCallId"))
            writer.uint32(/* id 3, wireType 0 =*/24).int32(message.ToCallId);
        return writer;
    };

    /**
     * Decodes a WebRTCTransferCall message from the specified reader or buffer.
     * @function decode
     * @memberof WebRTCTransferCall
     * @static
     * @param {$protobuf.Reader|Uint8Array} reader Reader or buffer to decode from
     * @param {number} [length] Message length if known beforehand
     * @returns {WebRTCTransferCall} WebRTCTransferCall
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    WebRTCTransferCall.decode = function decode(reader, length) {
        if (!(reader instanceof $Reader))
            reader = $Reader.create(reader);
        let end = length === undefined ? reader.len : reader.pos + length, message = new $root.WebRTCTransferCall();
        while (reader.pos < end) {
            let tag = reader.uint32();
            switch (tag >>> 3) {
            case 1:
                message.Id = reader.int32();
                break;
            case 2:
                message.destination = reader.string();
                break;
            case 3:
                message.ToCallId = reader.int32();
                break;
            default:
                reader.skipType(tag & 7);
                break;
            }
        }
        return message;
    };

    return WebRTCTransferCall;
})();

export const RequestRegisterWebRTCEndpoint = $root.RequestRegisterWebRTCEndpoint = (() => {

    /**
     * Properties of a RequestRegisterWebRTCEndpoint.
     * @exports IRequestRegisterWebRTCEndpoint
     * @property {boolean} register RequestRegisterWebRTCEndpoint register
     */

    /**
     * Constructs a new RequestRegisterWebRTCEndpoint.
     * @exports RequestRegisterWebRTCEndpoint
     * @classdesc Represents a RequestRegisterWebRTCEndpoint.
     * @constructor
     * @param {Partial<RequestRegisterWebRTCEndpoint>} [properties] Properties to set
     */
    function RequestRegisterWebRTCEndpoint(properties) {
        if (properties)
            for (let keys = Object.keys(properties), i = 0; i < keys.length; ++i)
                if (properties[keys[i]] != null)
                    this[keys[i]] = properties[keys[i]];
    }

    /**
     * RequestRegisterWebRTCEndpoint register.
     * @member {boolean} register
     * @memberof RequestRegisterWebRTCEndpoint
     * @instance
     */

    /**
     * Encodes the specified RequestRegisterWebRTCEndpoint message. Does not implicitly {@link RequestRegisterWebRTCEndpoint.verify|verify} messages.
     * @function encode
     * @memberof RequestRegisterWebRTCEndpoint
     * @static
     * @param {RequestRegisterWebRTCEndpoint} message RequestRegisterWebRTCEndpoint message or plain object to encode
     * @param {$protobuf.Writer} [writer] Writer to encode to
     * @returns {$protobuf.Writer} Writer
     */
    RequestRegisterWebRTCEndpoint.encode = function encode(message, writer) {
        if (!writer)
            writer = $Writer.create();
        writer.uint32(/* id 1, wireType 0 =*/8).bool(message.register);
        return writer;
    };

    /**
     * Decodes a RequestRegisterWebRTCEndpoint message from the specified reader or buffer.
     * @function decode
     * @memberof RequestRegisterWebRTCEndpoint
     * @static
     * @param {$protobuf.Reader|Uint8Array} reader Reader or buffer to decode from
     * @param {number} [length] Message length if known beforehand
     * @returns {RequestRegisterWebRTCEndpoint} RequestRegisterWebRTCEndpoint
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    RequestRegisterWebRTCEndpoint.decode = function decode(reader, length) {
        if (!(reader instanceof $Reader))
            reader = $Reader.create(reader);
        let end = length === undefined ? reader.len : reader.pos + length, message = new $root.RequestRegisterWebRTCEndpoint();
        while (reader.pos < end) {
            let tag = reader.uint32();
            switch (tag >>> 3) {
            case 1:
                message.register = reader.bool();
                break;
            default:
                reader.skipType(tag & 7);
                break;
            }
        }
        return message;
    };

    /**
     * Converts a RequestRegisterWebRTCEndpoint message to GenericMessage
     * @function toGenericMessage
     * @memberof RequestRegisterWebRTCEndpoint
     * @instance
     * @returns {GenericMessage} GenericMessage
     */
    RequestRegisterWebRTCEndpoint.prototype.toGenericMessage = function toGenericMessage() {
        return new $root.GenericMessage({MessageId: 163, registerWebRTC : this});
    };

    return RequestRegisterWebRTCEndpoint;
})();

export const ChatTyping = $root.ChatTyping = (() => {

    /**
     * Properties of a ChatTyping.
     * @exports IChatTyping
     * @property {string} [Party] ChatTyping Party
     * @property {string} [User] ChatTyping User
     */

    /**
     * Constructs a new ChatTyping.
     * @exports ChatTyping
     * @classdesc Represents a ChatTyping.
     * @constructor
     * @param {Partial<ChatTyping>} [properties] Properties to set
     */
    function ChatTyping(properties) {
        if (properties)
            for (let keys = Object.keys(properties), i = 0; i < keys.length; ++i)
                if (properties[keys[i]] != null)
                    this[keys[i]] = properties[keys[i]];
    }

    /**
     * ChatTyping Party.
     * @member {string} Party
     * @memberof ChatTyping
     * @instance
     */

    /**
     * ChatTyping User.
     * @member {string} User
     * @memberof ChatTyping
     * @instance
     */

    /**
     * Encodes the specified ChatTyping message. Does not implicitly {@link ChatTyping.verify|verify} messages.
     * @function encode
     * @memberof ChatTyping
     * @static
     * @param {ChatTyping} message ChatTyping message or plain object to encode
     * @param {$protobuf.Writer} [writer] Writer to encode to
     * @returns {$protobuf.Writer} Writer
     */
    ChatTyping.encode = function encode(message, writer) {
        if (!writer)
            writer = $Writer.create();
        if (message.Party != null && message.hasOwnProperty("Party"))
            writer.uint32(/* id 1, wireType 2 =*/10).string(message.Party);
        if (message.User != null && message.hasOwnProperty("User"))
            writer.uint32(/* id 2, wireType 2 =*/18).string(message.User);
        return writer;
    };

    /**
     * Decodes a ChatTyping message from the specified reader or buffer.
     * @function decode
     * @memberof ChatTyping
     * @static
     * @param {$protobuf.Reader|Uint8Array} reader Reader or buffer to decode from
     * @param {number} [length] Message length if known beforehand
     * @returns {ChatTyping} ChatTyping
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    ChatTyping.decode = function decode(reader, length) {
        if (!(reader instanceof $Reader))
            reader = $Reader.create(reader);
        let end = length === undefined ? reader.len : reader.pos + length, message = new $root.ChatTyping();
        while (reader.pos < end) {
            let tag = reader.uint32();
            switch (tag >>> 3) {
            case 1:
                message.Party = reader.string();
                break;
            case 2:
                message.User = reader.string();
                break;
            default:
                reader.skipType(tag & 7);
                break;
            }
        }
        return message;
    };

    /**
     * Converts a ChatTyping message to GenericMessage
     * @function toGenericMessage
     * @memberof ChatTyping
     * @instance
     * @returns {GenericMessage} GenericMessage
     */
    ChatTyping.prototype.toGenericMessage = function toGenericMessage() {
        return new $root.GenericMessage({MessageId: 180, UserTypingChat : this});
    };

    return ChatTyping;
})();

export const GenericMessage = $root.GenericMessage = (() => {

    /**
     * Properties of a GenericMessage.
     * @exports IGenericMessage
     * @property {number} MessageId GenericMessage MessageId
     * @property {Login} [LoginRequest] GenericMessage LoginRequest
     * @property {RequestMyInfo} [GetMyInfo] GenericMessage GetMyInfo
     * @property {RequestSendChatMessage} [SendChatMessage] GenericMessage SendChatMessage
     * @property {RequestSetChatReceived} [MessagesReceived] GenericMessage MessagesReceived
     * @property {RequestRegisterWebRTCEndpoint} [registerWebRTC] GenericMessage registerWebRTC
     * @property {RequestWebRTCChangeSDPState} [ChangeSDPState] GenericMessage ChangeSDPState
     * @property {RequestSendChatFile} [SendChatFile] GenericMessage SendChatFile
     * @property {ChatTyping} [UserTypingChat] GenericMessage UserTypingChat
     * @property {LoginInfo} [LoginResponse] GenericMessage LoginResponse
     * @property {MyExtensionInfo} [MyInfo] GenericMessage MyInfo
     * @property {ResponseAcknowledge} [Acknowledge] GenericMessage Acknowledge
     * @property {ResponseMyMessages} [MyChatMessages] GenericMessage MyChatMessages
     * @property {MyWebRTCEndpoint} [webRTCEndpoint] GenericMessage webRTCEndpoint
     * @property {ResponseWebRTCChangeSDPState} [ChangeSDPStateResponse] GenericMessage ChangeSDPStateResponse
     * @property {NotificationChatFileProgress} [ChatFileProgress] GenericMessage ChatFileProgress
     */

    /**
     * Constructs a new GenericMessage.
     * @exports GenericMessage
     * @classdesc Represents a GenericMessage.
     * @constructor
     * @param {Partial<GenericMessage>} [properties] Properties to set
     */
    function GenericMessage(properties) {
        if (properties)
            for (let keys = Object.keys(properties), i = 0; i < keys.length; ++i)
                if (properties[keys[i]] != null)
                    this[keys[i]] = properties[keys[i]];
    }

    /**
     * GenericMessage MessageId.
     * @member {number} MessageId
     * @memberof GenericMessage
     * @instance
     */

    /**
     * GenericMessage LoginRequest.
     * @member {Login} LoginRequest
     * @memberof GenericMessage
     * @instance
     */

    /**
     * GenericMessage GetMyInfo.
     * @member {RequestMyInfo} GetMyInfo
     * @memberof GenericMessage
     * @instance
     */

    /**
     * GenericMessage SendChatMessage.
     * @member {RequestSendChatMessage} SendChatMessage
     * @memberof GenericMessage
     * @instance
     */

    /**
     * GenericMessage MessagesReceived.
     * @member {RequestSetChatReceived} MessagesReceived
     * @memberof GenericMessage
     * @instance
     */

    /**
     * GenericMessage registerWebRTC.
     * @member {RequestRegisterWebRTCEndpoint} registerWebRTC
     * @memberof GenericMessage
     * @instance
     */

    /**
     * GenericMessage ChangeSDPState.
     * @member {RequestWebRTCChangeSDPState} ChangeSDPState
     * @memberof GenericMessage
     * @instance
     */

    /**
     * GenericMessage SendChatFile.
     * @member {RequestSendChatFile} SendChatFile
     * @memberof GenericMessage
     * @instance
     */

    /**
     * GenericMessage UserTypingChat.
     * @member {ChatTyping} UserTypingChat
     * @memberof GenericMessage
     * @instance
     */

    /**
     * GenericMessage LoginResponse.
     * @member {LoginInfo} LoginResponse
     * @memberof GenericMessage
     * @instance
     */

    /**
     * GenericMessage MyInfo.
     * @member {MyExtensionInfo} MyInfo
     * @memberof GenericMessage
     * @instance
     */

    /**
     * GenericMessage Acknowledge.
     * @member {ResponseAcknowledge} Acknowledge
     * @memberof GenericMessage
     * @instance
     */

    /**
     * GenericMessage MyChatMessages.
     * @member {ResponseMyMessages} MyChatMessages
     * @memberof GenericMessage
     * @instance
     */

    /**
     * GenericMessage webRTCEndpoint.
     * @member {MyWebRTCEndpoint} webRTCEndpoint
     * @memberof GenericMessage
     * @instance
     */

    /**
     * GenericMessage ChangeSDPStateResponse.
     * @member {ResponseWebRTCChangeSDPState} ChangeSDPStateResponse
     * @memberof GenericMessage
     * @instance
     */

    /**
     * GenericMessage ChatFileProgress.
     * @member {NotificationChatFileProgress} ChatFileProgress
     * @memberof GenericMessage
     * @instance
     */

    /**
     * Encodes the specified GenericMessage message. Does not implicitly {@link GenericMessage.verify|verify} messages.
     * @function encode
     * @memberof GenericMessage
     * @static
     * @param {GenericMessage} message GenericMessage message or plain object to encode
     * @param {$protobuf.Writer} [writer] Writer to encode to
     * @returns {$protobuf.Writer} Writer
     */
    GenericMessage.encode = function encode(message, writer) {
        if (!writer)
            writer = $Writer.create();
        writer.uint32(/* id 1, wireType 0 =*/8).int32(message.MessageId);
        if (message.LoginRequest != null && message.hasOwnProperty("LoginRequest"))
            $root.Login.encode(message.LoginRequest, writer.uint32(/* id 100, wireType 2 =*/802).fork()).ldelim();
        if (message.GetMyInfo != null && message.hasOwnProperty("GetMyInfo"))
            $root.RequestMyInfo.encode(message.GetMyInfo, writer.uint32(/* id 102, wireType 2 =*/818).fork()).ldelim();
        if (message.SendChatMessage != null && message.hasOwnProperty("SendChatMessage"))
            $root.RequestSendChatMessage.encode(message.SendChatMessage, writer.uint32(/* id 110, wireType 2 =*/882).fork()).ldelim();
        if (message.MessagesReceived != null && message.hasOwnProperty("MessagesReceived"))
            $root.RequestSetChatReceived.encode(message.MessagesReceived, writer.uint32(/* id 112, wireType 2 =*/898).fork()).ldelim();
        if (message.registerWebRTC != null && message.hasOwnProperty("registerWebRTC"))
            $root.RequestRegisterWebRTCEndpoint.encode(message.registerWebRTC, writer.uint32(/* id 163, wireType 2 =*/1306).fork()).ldelim();
        if (message.ChangeSDPState != null && message.hasOwnProperty("ChangeSDPState"))
            $root.RequestWebRTCChangeSDPState.encode(message.ChangeSDPState, writer.uint32(/* id 164, wireType 2 =*/1314).fork()).ldelim();
        if (message.SendChatFile != null && message.hasOwnProperty("SendChatFile"))
            $root.RequestSendChatFile.encode(message.SendChatFile, writer.uint32(/* id 179, wireType 2 =*/1434).fork()).ldelim();
        if (message.UserTypingChat != null && message.hasOwnProperty("UserTypingChat"))
            $root.ChatTyping.encode(message.UserTypingChat, writer.uint32(/* id 180, wireType 2 =*/1442).fork()).ldelim();
        if (message.LoginResponse != null && message.hasOwnProperty("LoginResponse"))
            $root.LoginInfo.encode(message.LoginResponse, writer.uint32(/* id 200, wireType 2 =*/1602).fork()).ldelim();
        if (message.MyInfo != null && message.hasOwnProperty("MyInfo"))
            $root.MyExtensionInfo.encode(message.MyInfo, writer.uint32(/* id 201, wireType 2 =*/1610).fork()).ldelim();
        if (message.Acknowledge != null && message.hasOwnProperty("Acknowledge"))
            $root.ResponseAcknowledge.encode(message.Acknowledge, writer.uint32(/* id 207, wireType 2 =*/1658).fork()).ldelim();
        if (message.MyChatMessages != null && message.hasOwnProperty("MyChatMessages"))
            $root.ResponseMyMessages.encode(message.MyChatMessages, writer.uint32(/* id 209, wireType 2 =*/1674).fork()).ldelim();
        if (message.webRTCEndpoint != null && message.hasOwnProperty("webRTCEndpoint"))
            $root.MyWebRTCEndpoint.encode(message.webRTCEndpoint, writer.uint32(/* id 227, wireType 2 =*/1818).fork()).ldelim();
        if (message.ChangeSDPStateResponse != null && message.hasOwnProperty("ChangeSDPStateResponse"))
            $root.ResponseWebRTCChangeSDPState.encode(message.ChangeSDPStateResponse, writer.uint32(/* id 228, wireType 2 =*/1826).fork()).ldelim();
        if (message.ChatFileProgress != null && message.hasOwnProperty("ChatFileProgress"))
            $root.NotificationChatFileProgress.encode(message.ChatFileProgress, writer.uint32(/* id 232, wireType 2 =*/1858).fork()).ldelim();
        return writer;
    };

    /**
     * Decodes a GenericMessage message from the specified reader or buffer.
     * @function decode
     * @memberof GenericMessage
     * @static
     * @param {$protobuf.Reader|Uint8Array} reader Reader or buffer to decode from
     * @param {number} [length] Message length if known beforehand
     * @returns {GenericMessage} GenericMessage
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    GenericMessage.decode = function decode(reader, length) {
        if (!(reader instanceof $Reader))
            reader = $Reader.create(reader);
        let end = length === undefined ? reader.len : reader.pos + length, message = new $root.GenericMessage();
        while (reader.pos < end) {
            let tag = reader.uint32();
            switch (tag >>> 3) {
            case 1:
                message.MessageId = reader.int32();
                break;
            case 100:
                message.LoginRequest = $root.Login.decode(reader, reader.uint32());
                break;
            case 102:
                message.GetMyInfo = $root.RequestMyInfo.decode(reader, reader.uint32());
                break;
            case 110:
                message.SendChatMessage = $root.RequestSendChatMessage.decode(reader, reader.uint32());
                break;
            case 112:
                message.MessagesReceived = $root.RequestSetChatReceived.decode(reader, reader.uint32());
                break;
            case 163:
                message.registerWebRTC = $root.RequestRegisterWebRTCEndpoint.decode(reader, reader.uint32());
                break;
            case 164:
                message.ChangeSDPState = $root.RequestWebRTCChangeSDPState.decode(reader, reader.uint32());
                break;
            case 179:
                message.SendChatFile = $root.RequestSendChatFile.decode(reader, reader.uint32());
                break;
            case 180:
                message.UserTypingChat = $root.ChatTyping.decode(reader, reader.uint32());
                break;
            case 200:
                message.LoginResponse = $root.LoginInfo.decode(reader, reader.uint32());
                break;
            case 201:
                message.MyInfo = $root.MyExtensionInfo.decode(reader, reader.uint32());
                break;
            case 207:
                message.Acknowledge = $root.ResponseAcknowledge.decode(reader, reader.uint32());
                break;
            case 209:
                message.MyChatMessages = $root.ResponseMyMessages.decode(reader, reader.uint32());
                break;
            case 227:
                message.webRTCEndpoint = $root.MyWebRTCEndpoint.decode(reader, reader.uint32());
                break;
            case 228:
                message.ChangeSDPStateResponse = $root.ResponseWebRTCChangeSDPState.decode(reader, reader.uint32());
                break;
            case 232:
                message.ChatFileProgress = $root.NotificationChatFileProgress.decode(reader, reader.uint32());
                break;
            default:
                reader.skipType(tag & 7);
                break;
            }
        }
        return message;
    };

    return GenericMessage;
})();

export { $root as default };
