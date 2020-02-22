<?php
namespace PoP\UserState\Hooks;

use PoP\UserState\Facades\UserStateTypeDataResolverFacade;
use PoP\API\Hooks\AbstractMaybeDisableFieldsInPrivateSchemaHookSet;

abstract class AbstractMaybeDisableFieldsIfUserNotLoggedInHookSet extends AbstractMaybeDisableFieldsInPrivateSchemaHookSet
{
    protected function disableFieldsInPrivateSchemaMode(): bool
    {
        /**
         * If the user is not logged in, then do not register field names
         */
        $userStateTypeDataResolverFacade = UserStateTypeDataResolverFacade::getInstance();
        return !$userStateTypeDataResolverFacade->isUserLoggedIn();
    }
}
