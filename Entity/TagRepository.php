<?php
/*
 * This file is part of the Mundoreader Symfony Base package.
 *
 * (c) Mundo Reader S.L.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sh4ka\NewsORMBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * Class TagRepository
 * 
 * @category SymfonyBundle
 * @package  Sh4ka\NewsORMBundle\Entity
 * @author   Jesús Flores <jesus.flores@bq.com>
 * @license  http://opensource.org/licenses/GPL-3.0 GNU General Public License
 * @link     http://bq.com
 */
class TagRepository extends EntityRepository
{
    public function clearChildren($parentId){
        $em = $this->getEntityManager();
        $query = $em->createQuery('UPDATE NewsORMBundle:Tag t set t.parent = NULL WHERE t.parent = ?1');
        $query->setParameter(1, $parentId);
        return $query->getResult();
    }
}